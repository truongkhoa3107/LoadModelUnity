<!DOCTYPE html>
<html>
<head>
    <title>FBX File Loader</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/build/three.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/loaders/FBXLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/loaders/MTLLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/loaders/OBJLoader.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/controls/OrbitControls.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/three@0.132.2/examples/js/libs/fflate.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body style="overflow: hidden;">
    <div class="parent" style="position:relative">
        <div class="btn-block" style="z-index: 1000" style="position:absolute">
            <button id="rotata-left-btn"><i class="fa fa-arrow-circle-left fa-5x" aria-hidden="true"></i></button>
            <button id="rotata-right-btn"><i class="fa fa-arrow-circle-right fa-5x" aria-hidden="true"></i></button>
        </div>
        <div id="canvas" style="position:absolute; top:0; right:0; z-index:-1">
    </div>
    </div>
    <script>
        // if(myData['file_type'] == 'fbx'){
        //   init1();
        // }else if(myData['file_type'] == 'obj'){
        //   init2();
        // }
      
      function init1() {
            scene = new THREE.Scene();
            scene.background = new THREE.Color(0xdddddd);

            camera = new THREE.PerspectiveCamera(5, window.innerWidth/window.innerHeight, 100, 1500);
            camera.position.z = 1000;

            light = new THREE.HemisphereLight(0xffffff, 0x444444, 1.0);
            light.position.set(0, 1, 0);
            scene.add(light);

            light = new THREE.DirectionalLight(0xffffff, 1.0);
            light.position.set(100, 1, -50);
            scene.add(light);

            renderer = new THREE.WebGLRenderer({antialias:true});
            renderer.setSize(window.innerWidth, window.innerHeight);

            container = document.getElementById( 'canvas' );            
            container.appendChild( renderer.domElement );

            controls = new THREE.OrbitControls(camera,  renderer.domElement);
            controls.target.set(0,140,0);
            controls.enablePan = false;
            controls.maxPolarAngle = Math.PI / 2;
            controls.minPolarAngle = Math.PI / 2;
            controls.enableZoom = false;
            controls.update();
            
            const fbxLoader = new THREE.FBXLoader();
            fbxLoader.load('{{ asset('storage/') }}'+'/2023-11-221700665119/Charity_Unity.fbx', (object) => {
                // Event listener for arrow key presses
                document.body.addEventListener('keydown', function (event) {

                    switch (event.key) {
                        // case 'ArrowUp':
                        //     object.rotateX(-0.1);
                        //     break;
                        // case 'ArrowDown':
                        //     object.rotateX(0.1);
                        //     break;
                        case 'ArrowLeft':
                            object.rotateY(-0.05);
                            break;
                        case 'ArrowRight':
                            object.rotateY(0.05);
                            break;
                    }
                    event.preventDefault();
                });

                // Event listener for button presses
                isButtonLeftPressed = false;
                isButtonRightPressed = false;
                myInterval = null;

                // // Function to start action on button hold
                function rotateLeft() {
                    object.rotateY(-0.1);
                }

                function rotateRight() {
                    object.rotateY(0.1);
                }
                
                function startRotate(direction) {
                    if (direction == "left") {
                        isButtonLeftPressed = true;
                        rotateLeft();
                        myInterval = setInterval(function() {
                            rotateLeft();
                        }, 0);
                    } else if(direction == "right") {
                        isButtonRightPressed = true;
                        rotateRight();
                        myInterval = setInterval(function() {
                            rotateRight();
                        }, 0);
                    }
                }
                

                // Function to stop action on button release
                function stopRotate() {
                    isButtonLeftPressed = false;
                    isButtonRightPressed = false;
                    clearInterval(myInterval);
                }

                // Add mousedown and mouseup event listeners
                left_btn = document.getElementById("rotata-left-btn");
                left_btn.addEventListener('mousedown', function() {startRotate("left")});
                left_btn.addEventListener('mouseup', function() {stopRotate()});
                left_btn.addEventListener('mouseout', function() {stopRotate()});

                // left_btn.addEventListener('click', function() {
                //     object.rotateY(-0.1);
                // });

                right_btn = document.getElementById("rotata-right-btn");
                right_btn.addEventListener('mousedown', function() {startRotate("right")});
                right_btn.addEventListener('mouseup', function() {stopRotate()});
                right_btn.addEventListener('mouseout', function() {stopRotate()});
                // right_btn.addEventListener('click', function() {
                //     object.rotateY(0.1);
                // });

                scene.add(object);
                animate();
            });

        }
        
        function animate(){
            renderer.render(scene,camera);
            requestAnimationFrame(animate);
        }

        


        init1();
    </script>
</body>
</html>