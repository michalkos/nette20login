<?php

class TwitterAuthenticator
{

	/** @var UserModel */
	private $userModel;

	public function __construct(UserModel $userModel)
	{
		$this->userModel = $userModel;
	}

	/**
	 * @param stdClass $twitterUser
	 * @return \Nette\Security\Identity
	 */
	public function authenticate(stdClass $twitterUser)
	{
		$user = $this->userModel->findUser(array('twitter_id' => $twitterUser->id_str));

		if ($user) {
			$this->updateMissingData($user, $twitterUser);
		} else {
			$user = $this->register($twitterUser);
		}

		return $this->userModel->createIdentity($user);
	}

	public function register(stdClass $info)
	{
		return $this->userModel->registerUser(array(
			'twitter_id' => $info->id_str,
			'twitter' => $info->screen_name,
			'name' => $info->name,
		));
	}

	public function updateMissingData($user, stdClass $info)
	{
		$updateData = array();
		
		if (empty($user['twitter'])) {
			$updateData['twitter'] = $info->screen_name;
		}
		
		if (empty($user['name'])) {
			$updateData['name'] = $info->name;
		}
		
		$this->userModel->updateUser($user, $updateData);
	}

}
