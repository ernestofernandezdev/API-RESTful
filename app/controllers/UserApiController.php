<?php

require_once "./app/models/UserModel.php";

class UserApiController extends ApiController {
    private $model;

    public function __construct() {
        parent::__construct();
        $this->model = new UserModel();
    }

    public function getToken($params = []) {

    }
}