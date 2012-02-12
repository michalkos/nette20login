<?php

class FacebookAuthenticator
{

	/** @var UserModel */
	private $userModel;

	public function __construct(UserModel $userModel)
	{
		$this->userModel = $userModel;
	}

	/**
	 * @param array $fbUser
	 * @return \Nette\Security\Identity
	 */
	public function authenticate(array $fbUser)
	{
		$user = $this->userModel->findUser(array('fbuid' => $fbUser['id']));

		if ($user) {
			$this->updateMissingData($user, $fbUser);
		} else {
			$user = $this->register($fbUser);
		}

		return $this->userModel->createIdentity($user);
	}

	public function register(array $me)
	{
		return $this->userModel->registerUser(array(
			'mail' => $me['email'],
			'fbuid' => $me['id'],
			'name' => $me['name'],
		));
	}

	public function updateMissingData($user, array $me)
	{
		$updateData = array();

		if (empty($user['name'])) {
			$updateData['name'] = $me['name'];
		}

		if (empty($user['mail'])) {
			$updateData['mail'] = $me['email'];
		}

		if (!empty($updateData)) {
			$this->userModel->updateUser($user, $updateData);
		}
	}

}
