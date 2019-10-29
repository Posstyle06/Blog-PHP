<?php

function loadClass($class)
{
    if (file_exists($class . '.php')) {
        require $class . '.php';
    }
    elseif (file_exists('model/'.$class . '.php')) {
        require 'model/'.$class . '.php';
    }
    elseif (file_exists('Entity/'.$class . '.php')) {
        require 'Entity/'.$class . '.php';
    }
    elseif (file_exists('controller/'.$class . '.php')) {
        require 'controller/'.$class . '.php';
    }
}

spl_autoload_register('loadClass'); // On enregistre la fonction en autoload pour qu'elle soit appelée dès qu'on instanciera une classe non déclarée.

try 
{

    if (isset($_GET['action'])) 
    {

        if ($_GET['action'] == 'listPosts') 
        {
            FrontendController::listPosts();
        }

        //connexion administrateur
        elseif ($_GET['action'] == 'connectAdmin') 
        {
            
            BackendController::adminConnect(); 
            
        }  

        //Ajout d'un post
        elseif ($_GET['action'] == 'addpost') 
        {
            
            BackendController::addPost(); 
            
        }  

        //Selection d'un post avec ses commentaires
        elseif ($_GET['action'] == 'post') 
        {
            FrontendController::post();
        }  

        //Ajout d'un commentaire
        elseif ($_GET['action'] == 'addComment') 
        {
            FrontendController::addComment();
        }

        //Affiche un commentaire pour modif
        elseif ($_GET['action'] == 'Comment') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                FrontendController::comment();
            }
            else
            {
                FrontendController::listPosts();
            }
        }  

        //Modifie le commentaire
        elseif ($_GET['action'] == 'update') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                {
                    updateComment($_GET['id'], addslashes($_POST['author']), addslashes($_POST['comment']));
                }
                else
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else
            {
                FrontendController::listPosts();
            }
        }  

    }
    else 
    {
        FrontendController::listPosts();
    }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
