<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <title>Steganographie</title>
</head>
<body>
    <!-- Nav tabs -->
    <ul class="nav" id="navId">
        <li class="nav-item">
            <a href="#" class="nav-link active">Steganographie</a>
        </li>
    </ul>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="title col-md-12"><h3>Ajouter un message ou une image dans un fichier son</h3></div>
                <div class="formulaire col-md-12">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="">Choisir un fichier son</label>
                            <input type="file" class="form-control-file" name="" id="" placeholder="">
                            <label for="">Choisir une image</label>
                            <input type="file" class="form-control-file" name="" id="" placeholder="">
                            <label for="">Message</label>
                            <textarea class="form-control" name="" id="" rows="2"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="title col-md-12"><h3>Recuperer un message ou une image présente dans un fichier son</h3></div>
                <div class="formulaire col-md-12">
                    <form action="" method="post">
                        <div class="form-group">
                        <label for="">Choisir un fichier son</label>
                        <input type="file" class="form-control-file" name="" id="" placeholder="">
                        </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</body>
</html>