<!DOCTYPE html>
<html >
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="style_lien.css" />
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <title>Photo</title>
    </head>
    <body>
        <?php include("NavBar.php");?>
        <br/>

        <div class="contentarea">

            <h3>
                PHOTO DU CITOYEN
            </h3>
            <hr>

            <div class="content">
                <div class="camera">
                    <video id="video">Video stream not available.</video>
                    <button id="startbutton">Take photo</button>
                </div>
                <canvas id="canvas">
                </canvas>
                <div class="output">
                    <img id="photo" alt="The screen capture will appear in this box."/>
                </div>
                
                
            </div>

            <script>
            function afficher() {
                var bon= document.getElementById("photo");
                alert(bon);
            }

            function enregistre(){
            // ici le code PHP pour enregistre l'image dans un fichier.
                $url = 'images/logo.png';
                $path = pathinfo($url);
                // vérification de l'extension pour ne pas télécharger n'importe quoi
                $extension = isset($path['extension']) ? strtolower($path['extension']) : null;
                if(in_array($extension, array('jpg','jpeg','png','gif')))
                {
                    $dossier = 'dossier_destination/';
                        // ajoute un préfixe 'copy_'
                    $nouveau_nom = 'copy_'.$path['basename'];
                
                    // Ouvre un fichier pour lire un contenu existant
                    $current = file_get_contents($url);
                    // Ecrit dans la destination
                    file_put_contents($dossier.$nouveau_nom, $current);
                }
            }
            </script>
            
            <hr>
            <h3>
                EMPREINTES DIGITALES DU CITOYEN
            </h3>

            <div class="empreinte">

                <div class="gauche">
                    <p id="texte">Main gauche</p>
                    <div class="pouce">
                        <a class="take" href="" >pouce</a>
                    </div>
                    <div class="index">
                        <a class="take" href="" >index</a>
                    </div>
                    <div class="majeur">
                        <a class="take" href="" >majeur</a>
                    </div>
                    <div class="anulaire">
                        <a class="take" href="" >anulaire</a>
                    </div>
                    <div class="oriculaire">
                        <a class="take" href="" >oriculaire</a>
                    </div>

                </div>

                <div class="droite">
                    <p id="texte">Main droite  </p>
                    <div class="pouce">
                        <a class="take" href="" >pouce</a>
                    </div>
                    <div class="index">
                        <a class="take" href="" >index</a>
                    </div>
                    <div class="majeur">
                        <a class="take" href="" >majeur</a>
                    </div>
                    <div class="anulaire">
                        <a class="take" href="" >anulaire</a>
                    </div>
                    <div class="oriculaire">
                        <a class="take" href="" >oriculaire</a>
                    </div>
                </div>

            </div>
            <hr>

            <div class="validation">
                <a class="btn btn-warning  text-black" href="PrintCarte.php" style="border-radius: 1rem;" >Enregistrer</a>
                <a class="btn btn-warning  text-black" href="Dashboard.php" style="border-radius: 1rem;" >Annuler</a>
            </div>
            <br/>

        </div>

        <!-- footer-->
        <div class="card-footer bg-secondary">
            <div class="text text-center text-white">
                <h8>Copyright © MinoCard AN-GAP.com™. Tous droits réservés</h8>
            </div>
        </div> 
        <!-- footer-->

        <style>

            .empreinte{
                margin-left:300px;
                display:flex;
                flex-direction:column;
            }
            .gauche{
                display:flex;
            }
            .droite{
                display:flex;
            }
            #texte{
                margin-top:50px;
            }

            .validation{
                margin-left:300px;
            }
            .pouce, .index, .majeur, .anulaire, .oriculaire{
                display:inline-block;
                width: 100px;
                height: 100px;
                border: 1px solid black;
                margin: 20px;

            }

            .take{
                margin-left:12px;
                text-decoration:none;
            }
            #video {
                border: 1px solid black;
                box-shadow: 2px 2px 3px black;
                width:320px;
                height:240px;
            }

            #photo {
                border: 1px solid black;
                box-shadow: 2px 2px 3px black;
                width:320px;
                height:240px;
            }

            #canvas {
                display:none;
            }

            .content{
                display:flex;
                margin-left:300px;
            }
            .camera {
                width: 340px;
                display:inline-block;
            }

            .output {
                width: 340px;
                display:inline-block;
                vertical-align: top;
            }

            #startbutton {
                display:block;
                position:relative;
                margin-left:auto;
                margin-right:auto;
                bottom:32px;
                background-color: rgba(0, 150, 0, 0.5);
                border: 1px solid rgba(255, 255, 255, 0.7);
                box-shadow: 0px 0px 1px 2px rgba(0, 0, 0, 0.2);
                font-size: 14px;
                font-family: "Lucida Grande", "Arial", sans-serif;
                color: rgba(255, 255, 255, 1.0);
            }

            .contentarea {
                margin-left:120px;
                font-size: 16px;
                font-family: "Lucida Grande", "Arial", sans-serif;
                width: 1300px;
            }

            h3, hr{
                margin-left: 300px;
            }
        </style>

        <script>
            (function() {
                // The width and height of the captured photo. We will set the
                // width to the value defined here, but the height will be
                // calculated based on the aspect ratio of the input stream.

                var width = 320;    // We will scale the photo width to this
                var height = 0;     // This will be computed based on the input stream

                // |streaming| indicates whether or not we're currently streaming
                // video from the camera. Obviously, we start at false.

                var streaming = false;

                // The various HTML elements we need to configure or control. These
                // will be set by the startup() function.

                var video = null;
                var canvas = null;
                var photo = null;
                var startbutton = null;

                function showViewLiveResultButton() {
                    if (window.self !== window.top) {
                    // Ensure that if our document is in a frame, we get the user
                    // to first open it in its own tab or window. Otherwise, it
                    // won't be able to request permission for camera access.
                    document.querySelector(".contentarea").remove();
                    const button = document.createElement("button");
                    button.textContent = "View live result of the example code above";
                    document.body.append(button);
                    button.addEventListener('click', () => window.open(location.href));
                    return true;
                    }
                    return false;
                }

                function startup() {
                    if (showViewLiveResultButton()) { return; }
                    video = document.getElementById('video');
                    canvas = document.getElementById('canvas');
                    photo = document.getElementById('photo');
                    startbutton = document.getElementById('startbutton');

                    navigator.mediaDevices.getUserMedia({video: true, audio: false})
                    .then(function(stream) {
                    video.srcObject = stream;
                    video.play();
                    })
                    
                    .catch(function(err) {
                    console.log("An error occurred: " + err);
                    });

                    video.addEventListener('canplay', function(ev){
                    if (!streaming) {
                        height = video.videoHeight / (video.videoWidth/width);

                        // Firefox currently has a bug where the height can't be read from
                        // the video, so we will make assumptions if this happens.

                        if (isNaN(height)) {
                        height = width / (4/3);
                        }

                        video.setAttribute('width', width);
                        video.setAttribute('height', height);
                        canvas.setAttribute('width', width);
                        canvas.setAttribute('height', height);
                        streaming = true;
                    }
                    }, false);

                    startbutton.addEventListener('click', function(ev){
                    takepicture();
                    ev.preventDefault();
                    }, false);
                    clearphoto();
                }

                // Fill the photo with an indication that none has been
                // captured.

                function clearphoto() {
                    var context = canvas.getContext('2d');
                    context.fillStyle = "#AAA";
                    context.fillRect(0, 0, canvas.width, canvas.height);

                    var data = canvas.toDataURL('image/png');
                    photo.setAttribute('src', data);
                }

                // Capture a photo by fetching the current contents of the video
                // and drawing it into a canvas, then converting that to a PNG
                // format data URL. By drawing it on an offscreen canvas and then
                // drawing that to the screen, we can change its size and/or apply
                // other changes before drawing it.

                function takepicture() {
                    var context = canvas.getContext('2d');
                    if (width && height) {
                    canvas.width = width;
                    canvas.height = height;
                    context.drawImage(video, 0, 0, width, height);

                    var data = canvas.toDataURL('image/png');
                    photo.setAttribute('src', data);

                    //afficher le contenu de l'image
                    //document.getElementById('demo').innerHTML= data;
                    console.log(photo);
                    
                    } else {
                    clearphoto();
                    }
                    
                }

                // Set up our event listener to run the startup process
                // once loading is complete.
                window.addEventListener('load', startup, false);
                })();
        </script>

    </body>
</html>
