<?php
class DB
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = ''; // This is just a placeholder, avoid storing passwords directly in code
    private $db = 'quanlydiem';
    private $myconn;
    private $connected = false; // Variable to check connection status

    // Method to establish database connection
    public function connect()
    {
        $this->myconn = new mysqli($this->host, $this->user, $this->pass, $this->db);

        // Check connection
        if ($this->myconn->connect_error) {
            // Handle connection error
            throw new Exception('Could not connect to database: ' . $this->myconn->connect_error);
        } else {
            // Set character set
            $this->myconn->set_charset('utf8');
            $this->connected = true; // Set connected flag to true
        }

        return $this->myconn;
    }

    // Method to close database connection
    public function close()
    {
        if ($this->connected && $this->myconn) {
            $this->myconn->close();
            // Optionally log or notify user when connection is closed
            // echo 'Connection closed!';
            $this->connected = false; // Connection closed
        }
    }

    // Method to check if connected to database
    public function isConnected()
    {
        return $this->connected;
    }

    // Method to execute a query
    public function query($sql)
    {
        $result = $this->myconn->query($sql);
        return $result !== false ? $result : false;
    }

    // Method to execute a select query
    public function select($sql)
    {
        $result = $this->myconn->query($sql);
        if ($result !== false) {
            $rows = array();
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            return false;
        }
    }

    // Method to execute an insert query
    public function insert($sql)
    {
        $result = $this->myconn->query($sql);
        return $result !== false && $this->myconn->affected_rows > 0 ? $this->myconn->insert_id : false;
    }

    // Method to execute an update query
    public function update($sql)
    {
        $result = $this->myconn->query($sql);
        return $result !== false && $this->myconn->affected_rows > 0 ? true : false;
    }

    // Method to execute a delete query
    public function delete($sql)
    {
        $result = $this->myconn->query($sql);
        return $result !== false && $this->myconn->affected_rows > 0 ? true : false;
    }
}

