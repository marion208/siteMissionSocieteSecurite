<?php

class ControllerContact
{
    public function checkIfContactInDB()
    {
        include 'models/countContacts.php';
    }

    public function listOfContacts()
    {
        include 'models/entity/entityContact.php';
        include 'models/createListContact.php';
        include 'views/listContact.php';
    }

    public function formAddNewContact()
    {
        include 'models/entity/entityContact.php';
        include 'models/createSelectOptionFormAddNewContact.php';
        include 'views/formAddNewContact.php';
    }

    public function checkIfContactExistsWithIdInDB()
    {
        include 'models/checkIfContactExists.php';
    }

    public function formModificationForContact()
    {
        include 'models/entity/entityContact.php';
        include 'models/infoContactById.php';
        include 'models/createSelectOptionFormAddNewContact.php';
        include 'views/formModifContact.php';
    }

    public function searchInfoforContactId()
    {
        include 'models/entity/entityContact.php';
        include 'models/infoContactById.php';
        include 'views/infoContactById.php';
    }
}
