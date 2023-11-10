<?php
require_once "./app/models/ReviewsModel.php";
require_once "./app/models/GamesModel.php";
require_once "./app/models/UsersModel.php";
require_once "./app/controllers/ApiController.php";

class ReviewsApiController extends ApiController {
    private $model;
    private $gamesModel;
    private $usersModel;

    public function __construct() {
        parent::__construct();
        $this->model = new ReviewsModel();
        $this->gamesModel = new GamesModel();
        $this->usersModel = new UsersModel();
    }

    public function get($params = []) {
        if (empty($params[":ID"])) {
            $reviews = $this->model->getReviews();
            $this->view->response($reviews, 200);
            return;
        }

        $review = $this->model->getReviewById($params[":ID"]);

        if (empty($review)) {
            $this->view->response("La tarea con el ID " . $params[":ID"] . " no existe.", 404);
            return;
        }

        if (empty($params[":subrecurso"])) {
            $this->view->response($review, 200);
            return;
        }

        switch ($params[":subrecurso"]) {
            case 'descripcion':
                $this->view->response($review->descripcion, 200);
                break;
            case 'puntuacion':
                $this->view->response($review->puntuacion, 200);
                break;
            case 'usuario':
                $this->view->response($review->usuario, 200);
                break;
            case 'juego':
                $this->view->response($review->juegoId, 200);
                break;
            default:
                $this->view->response("El subrecurso no existe.", 400);
                break;
        }
    }

    public function create() {
        $body = $this->getData();
        
        if (empty($body->descripcion) || empty($body->puntuacion) || empty($body->usuario) || empty($body->juegoId)) {
            $this->view->response("Algunos datos están vacíos.", 400);
            return;
        }

        $descripcion = $body->descripcion;
        $puntuacion = $body->puntuacion;
        $usuario = $body->usuario;
        $juegoId = $body->juegoId;

        if (empty($this->gamesModel->getGameById($juegoId))) {
            $this->view->response("No existe ningún juego con la id " . $juegoId . ".", 400);
            return;
        }

        if (empty($this->usersModel->getUserByUsername($usuario))) {
            $this->view->response("No existe ningún usuario con el nombre " . $usuario . ".", 400);
            return;
        }

        if ($puntuacion > 5 || $puntuacion < 1) {
            $this->view->response("La puntuación debe ser un valor entero entre 1 y 5.", 400);
            return;
        }

        $this->model->addReview($descripcion, $puntuacion, $usuario, $juegoId);
    }
}