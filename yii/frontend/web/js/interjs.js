    if ( window.history.replaceState ) {
    	window.history.replaceState( null, null, window.location.href );
    }
    $(document).ready(function($) {
    	if (sessionStorage.reload == 1) {

    		jload(sessionStorage.a,sessionStorage.b,sessionStorage.c);
    	}
        $('#docform-file').change(function(e){
            var fileName = e.target.files[0].name;
            $('#file_name').text('Đã chọn tệp '+fileName);
        });
    });

    function readURL(input) {
    	if (input.files && input.files[0]) {
    		var reader = new FileReader();

    		reader.onload = function(e) {
    			$('#avatar').css('background-image', "url("+e.target.result+")");
    		}

    		reader.readAsDataURL(input.files[0]);
    	}
    }

    $("#imageupload-imagefile").change(function() {
    	readURL(this);
    });


    $('.load-button').click(function() {
    	var a = $(this).attr('data-loadArea');
    	var b = $(this).attr('data-loadDir');
        var c = $(this).attr('data-loadPara');
        // index.php?r=interact%2Fform&&id=105
        var reload = sessionStorage.reload = $(this).attr('data-reload');
        jload(a,b,c);
        if (reload) {
           sessionStorage.a = a;
           sessionStorage.b = b;
           sessionStorage.c = c;
       }
   });

    function jload(a,b,c){
    	$('#'+a).load("index.php?r=interact%2F"+b+'&&'+c);

    }
    function deletes(bool,id,dir){
        if (bool) {
            
            window.location.replace("index.php?r=interact%2F"+dir+id);
        }
    }



