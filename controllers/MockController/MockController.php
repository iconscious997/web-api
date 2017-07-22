<?php
require_once(AUTHORIZATION_PATH . "/UserAuthorization.php");
require_once("MockControllerDatabase.php");

final class MockController extends UserAuthorization
{
    /**
     * Database Connector
     * @var null
     */
    private $db = null;

    /**
     * @var
     * All info from the input stream
     */
    private $jsonData;

    /**
     * @var
     * Used for unit testing
     */
    public $testAttribute;

    /**
     * __construct
     *
     * @access public
     */
    public function __construct()
    {
        parent::__construct();
        // set incoming json data
        $this->jsonData = $this->getJsonData();

        $this->db = new MockControllerDatabase();
    }

    public function get($id)
    {
        // used for unit tests
        $this->testAttribute = $id;
        // used for integration tests
        $data = [
            "controller" => "Test",
            "method" => "GET",
            "id" => $id
        ];
        $this->send($data);

    }

    public function head($id)
    {
        // used for unit tests
        $this->testAttribute = $id;
        // used for integration tests
        $data = [
            "controller" => "Test",
            "method" => "HEAD",
            "id" => $id
        ];
        $this->send($data);

    }

    public function post($id)
    {
        // used for unit tests
        $this->testAttribute = $id;
        // used for integration tests
        // make dummy data to output
        $data = [
            "controller" => "Test",
            "method" => "POST",
            "id" => $id,
            "data" => $this->jsonData
        ];
        $this->send($data);
    }

    public function put($id)
    {
        // used for unit tests
        $this->testAttribute = $id;
        // used for integration tests
        // make dummy data to output
        $data = [
            "controller" => "Test",
            "method" => "PUT",
            "id" => $id,
            "data" => $this->jsonData
        ];
        $this->send($data);
    }

    public function delete($id)
    {
        // used for unit tests
        $this->testAttribute = $id;
        // used for integration tests
        // make dummy data to output
        $data = [
            "controller" => "Test",
            "method" => "DELETE",
            "id" => $id,
            "data" => $this->jsonData
        ];
        $this->send($data);
    }

    public function options($id)
    {
        // used for unit tests
        $this->testAttribute = $id;
        // used for integration tests
        // make dummy data to output
        $data = [
            "controller" => "Test",
            "method" => "OPTIONS",
            "id" => $id,
            "data" => $this->jsonData
        ];
        $this->send($data);
    }

    public function patch($id)
    {
        // used for unit tests
        $this->testAttribute = $id;
        // used for integration tests
        // make dummy data to output
        $data = [
            "controller" => "Test",
            "method" => "PATCH",
            "id" => $id,
            "data" => $this->jsonData
        ];
        $this->send($data);
    }
}

