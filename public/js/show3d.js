$(document).ready(function () {
    $('#file-upload').submit(function(e) {
        e.preventDefault();
        let formData = new FormData(this);
        
        $.ajax({
            type:'POST',
            url: '/unity',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
                console.log(response);
                // if (response.success) {
                //     window.location.href = response.url;
                // }
            },
            error: function(response){
                alert('Prescription has not been created successfully');
            }
      });
    });


    // if(myData['file_type'] == 'fbx'){
    //     init1();
    // }else if(myData['file_type'] == 'obj'){
    //     init2();
    // }
    
    // function init1() {
    //     scene = new THREE.Scene();
    //     scene.background = new THREE.Color(0xdddddd);

    //     camera = new THREE.PerspectiveCamera(5, window.innerWidth/window.innerHeight, 1, 5000);
    //     camera.position.z = 1000;

    //     light = new THREE.HemisphereLight(0xffffff, 0x444444, 1.0);
    //     light.position.set(0, 1, 0);
    //     scene.add(light);

    //     light = new THREE.DirectionalLight(0xffffff, 1.0);
    //     light.position.set(0, 1, 0);
    //     scene.add(light);

    //     renderer = new THREE.WebGLRenderer({antialias:true});
    //     renderer.setSize(window.innerWidth, window.innerHeight);

    //     container = document.getElementById( 'canvas' );
    //     renderer.setSize(container.offsetWidth, 400);
        
    //     container.appendChild( renderer.domElement );

    //     controls = new THREE.OrbitControls(camera,  renderer.domElement);
    //     controls.addEventListener('change', renderer);
    //     const fbxLoader = new THREE.FBXLoader();
    //     let text1 = "storage/";
    //     let result = text1.concat(myData['url']);
    //     console.log(result);
    //     fbxLoader.load('/storage/'+'/'+myData['url']+'.fbx', (object) => {
    //         scene.add(object);
    //         animate();
    //     });
    // }
    // function animate(){
    //     renderer.render(scene,camera);
    //     requestAnimationFrame(animate);
    // }
});