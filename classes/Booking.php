<?php


class Booking {
    private $db;
    private $id;
    private $name;
    private $date;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($name, $date) {
        $sql = "INSERT INTO bookings (name, date) VALUES ('$name', '$date')";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function read($id) {
        $sql = "SELECT * FROM bookings WHERE id = $id";
        $result = $this->db->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
            $this->name = $row['name'];
            $this->date = $row['date'];
            return true;
        } else {
            return false;
        }
    }

    public function update($name, $date) {
        $sql = "UPDATE bookings SET name = '$name', date = '$date' WHERE id = $this->id";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete() {
        $sql = "DELETE FROM bookings WHERE id = $this->id";
        $result = $this->db->query($sql);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
