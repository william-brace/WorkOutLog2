<?php

$connect = mysqli_connect('localhost', 'root', 'root', 'WorkOutLog');

        if (!$connect)
        {
            die('Database connection failed!');
        }