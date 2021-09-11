<?php

    interface IModel{

        function get($id);
        function getAll();
        function delete($id);
        function update($id);
        function save($user);
    }

?>