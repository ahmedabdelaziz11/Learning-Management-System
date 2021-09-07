$(document).ready(function (){

    $('#lesson_video').on('change',function(){

        var video = this.files[0];
        var videoName = video.name.split('.').slice(0,-1).join('.');
        document.getElementById('video_name').innerHTML = videoName;

        var lesson_id =  document.getElementById('lessons_id').value;
        var course_id =  document.getElementById('course_id').value;


        var url =$(this).data('url');

        var formData = new FormData();
        formData.append('video',video);
        formData.append('lesson_id',lesson_id);
        formData.append('course_id',course_id);
        formData.append('videoName',videoName);


        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            xhr: function() {
            var xhr = new window.XMLHttpRequest();
        
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var percentComplete = Math.round(evt.loaded / evt.total * 100) + "%";
                    $('#video_progress').css('width',percentComplete).html(percentComplete);          
                }
            }, false);
        
            return xhr;
            },
            url: url,
            method: "POST",
            data: formData,
            processData:false,
            contentType: false,
            cache:false,
            success: function(video) {
                $('#uploading').html('uploaded successeflly');
                $(document).ajaxStop(function(){
                    setTimeout(function(){// wait for 5 secs(2)
                        location.reload(); // then reload the page.(3)
                    }, 5000); 
                });
            }
        }); 


    });
});