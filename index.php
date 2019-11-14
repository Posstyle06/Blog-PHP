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
        //connexion administrateur
        if ($_GET['action'] == 'connectAdmin')
        {
            
            BackendController::adminConnect(); 
            
        } 

        //déconnexion administrateur
        elseif ($_GET['action'] == 'disconnectAdmin')
        {
            
            BackendController::adminDisconnect(); 
            
        }   

        //ACTIONS SUR LES POSTS

        //Récupération de la liste des posts
        elseif ($_GET['action'] == 'listPosts') 
        {
            FrontendController::listPosts();
        } 

        //Selection d'un post avec ses commentaires
        elseif ($_GET['action'] == 'post') 
        {
            FrontendController::post();
        }  

        //Revenir sur la liste des post en mode Administrateur
        elseif ($_GET['action'] == 'adminListPosts') 
        {
            BackendController::adminListPosts();
        } 

        //Selection d'un post avec ses commentaires en mode admin
        elseif ($_GET['action'] == 'adminPost') 
        {
            BackendController::adminPost();
        } 

        elseif ($_GET['action'] == 'newPost') 
        {  
            BackendController::newPost();  
        } 

        //Ajout d'un post
        elseif ($_GET['action'] == 'addpost') 
        {  
            BackendController::addPost();  
        } 

        //Affiche un post pour modif en mode admin
        elseif ($_GET['action'] == 'adminUpdatePost') 
        {  
            BackendController::adminUpdatePost();  
        }  

        //Modifier un post
        elseif ($_GET['action'] == 'updatePost') 
        {  
            BackendController::updatePost();  
        }  

        //Supprimer un post
        elseif ($_GET['action'] == 'deletePost') 
        {  
            BackendController::deletePost();  
        }        

        //ACTIONS SUR LES COMMENTAIRES

        //Ajout d'un commentaire
        elseif ($_GET['action'] == 'addComment') 
        {
            FrontendController::addComment();
        }

        //Affiche un commentaire pour modif
        elseif ($_GET['action'] == 'Comment') 
        { 
            FrontendController::comment();
        }

        //signaler un commentaire
        elseif ($_GET['action'] == 'reportComment') 
        { 
            FrontendController::reportComment();
        }

        //Affiche un commentaire pour modif en mode admin
        elseif ($_GET['action'] == 'adminComment') 
        { 
            BackendController::adminComment();
        }

        //Supprime un commentaire
        elseif ($_GET['action'] == 'deleteComment') 
        { 
            BackendController::deleteComment();
        }

        //conserve un commentaire
        elseif ($_GET['action'] == 'keepComment') 
        { 
            BackendController::keepComment();
        }

        //Modifie le commentaire
        elseif ($_GET['action'] == 'update') 
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) 
            {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) 
                {
                    BackendController::updateComment();
                }
                else
                {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else
            {
                BackendController::adminListPosts();
            }
        } 

        elseif ($_GET['action'] == 'moderation') 
        {
            BackendController::getReportComments();
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
