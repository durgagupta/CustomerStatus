<?php
/**
 * Ace Extensions
 *
 * @category   Ace
 * @package    Ace_CustomerStatus
 * @author     Durga Shankar Gupta (dsguptas@gmail.com)
 * @copyright  Copyright (c) 2019 Ace Extensions ( http://aceextensions.com )
 */

namespace Ace\CustomerStatus\Plugin\Frontend\Magento\Customer\Model;

use Magento\Customer\Api\CustomerRepositoryInterface;
use Magento\Framework\Exception\State\UserLockedException;
use Magento\Framework\Exception\InvalidEmailOrPasswordException;

/**
 * Class AccountManagement
 * @package Ace\CustomerStatus\Plugin\Frontend\Magento\Customer\Model
 */
class AccountManagement
{
    /**
     * @var CustomerRepositoryInterface
     */
    private $customerRepository;

    /**
     * AccountManagement constructor.
     * @param CustomerRepositoryInterface $customerRepository
     */
    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * @param \Magento\Customer\Model\AccountManagement $subject
     * @param \Closure $proceed
     * @param $password
     * @param $username
     * @return mixed
     */
    public function aroundAuthenticate(
        \Magento\Customer\Model\AccountManagement $subject,
        \Closure $proceed,
        $username,$password
    ) {

        try {
            $customer = $this->customerRepository->get($username);

            if (!$customer->getCustomAttribute("customer_status")->getValue()) {
                throw new UserLockedException(__('The account is Disabled.'));
            }

        } catch (NoSuchEntityException $e) {
            throw new InvalidEmailOrPasswordException(__('Invalid login or password.'));
        }

        $result = $proceed($username, $password);
        return $result;
    }
}
