<?php
require_once './vendor/autoload.php';
class DatabaseController {
    private $conexion;
    private $host;
    private $usuario;
    private $contrasena;
    private $baseDeDatos;

    /**
     * Constructor for initializing database connection parameters and establishing connection.
     */
    public function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable('./');
        $dotenv->load();
        $this->host = $_ENV["DATABASE_HOST"];
        $this->usuario = $_ENV["DATABASE_USER"];
        $this->contrasena = $_ENV["DATABASE_PASSWORD"];
        $this->baseDeDatos = $_ENV["DATABASE_NAME"];
        $this->conectar();

        $conexion = $this->conectar();
        $conexion->close();
    }
    
    /**
     * Insert agency data into the agnencies table.
     *
     * @param array $agencyData the data to be inserted
     * @throws Exception error message
     * @return bool true if the insertion was successful, false otherwise
     */
    public function insertAgency(array $agencyData) {
        $conexion = $this->conectar();
        $consulta = "INSERT INTO agencias
        ( email, password, empresa, documento, direccion, ciudad, provincia, cp, pais, persona_contacto, telefono)
        VALUES( ?, ?, ?, ?, ?, ?, ?,  ?, ?, ?, ?);";
        $preparedQuery = $conexion->prepare($consulta);

        if ($preparedQuery === false) {
            die("Error en la preparación de la consulta: " . $conexion->error);
        }

        // Vincular los parámetros
        $preparedQuery->bind_param(
            "sssssssssss",
            $agencyData["mail"],
            $agencyData["password"],
            $agencyData["company"],
            $agencyData["cif_nif"],
            $agencyData["address"],
            $agencyData["city"],
            $agencyData["province"],
            $agencyData["postalCode"],  
            $agencyData["country"], 
            $agencyData["contactPerson"], 
            $agencyData["phone"], 
        );

        // Ejecutar la consulta de inserción
        $resultado = $preparedQuery->execute();
        if ($resultado === false) {
            die("Error al ejecutar la consulta de inserción: " . $preparedQuery->error);
        }

        $preparedQuery->close();
        $conexion->close();
    }



    
    /**
     * Connects to the database using the provided credentials.
     *
     * @throws Exception if unable to connect to the database
     * @return mysqli the database connection object
     */
    private function conectar() {
        $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->baseDeDatos);

        if ($this->conexion->connect_error) {
            die("Error de conexión a la base de datos: " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }

}