<?php

//Getting access to the variables definition file
define("FILE_PHP_VARIABLES","PHP-variables.php");

require_once FILE_PHP_VARIABLES; 


function generateHeader($title)
{
    ?><!DOCTYPE html>
        <html>
            <head>
                <meta charset="UTF-8">
                <!-- Neccessary for responsive design -->
                <meta name="viewport" content="width=device-width, initial-scale = 1.0"> 
                <link rel="stylesheet" type="text/css" href= "<?php echo FILE_CSS_STYLESHEET; ?>">                
                <title> <?php echo $title; ?></title>
                
            </head>
            <body>

            </body>
        </html>
    <?php
    createNavigationMenu($title);
    createHeadContainer();
    echo "Ola";
    

}

function generateFooter()
{
    createFootContainer();
    ?>
        
        <div class="footer">    
            <br><br>&copy; Matheus Emidio (1931358) <?php echo date('Y'); ?>     
            </body>
            </html>
        </div>
    <?php
}

function createNavigationMenu()
{
        ?>       
        <div class="navbar">
                <nav>
                    <?php createLogo(); ?>
                    <ul>  
                        <li><a href=" <?php echo FILE_INDEX_PHP; ?>">Home</a></li>                        
                        <li><a href="<?php echo FILE_ORDERS_PHP; ?>">Orders</a></li>
                        <li><a href="<?php echo FILE_BUYING_PHP; ?>">Buying</a></li>   
                    </ul>                  
                </nav>
                <br><br>
            </div>
        <?php    
}

function createLogo()
{
    ?>
        <img class="logo margin-zero" src="<?php echo FILE_LOGO; ?>" alt="logo"/>
   <?php
}

function createHeadContainer()
{
    ?>
        <div class="container">          
    <?php
}

function createFootContainer()
{
    ?>
        </div>
    <?php
}