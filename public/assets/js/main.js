$(document).ready(function () {
    let video_id = $('#saveLikeDislike').data('video')


    // $.ajax({
    //     url: "{{url('check-likedislike')}}",
    //     type: 'post',
    //     datatype: 'json',
    //     data:{
    //         video: video_id,
    //         _token:"{{csrf_token()}}"
    //     },
    //     success:function (res) {
    //         if(res.result == 'like'){
    //             like.addClass('active').removeClass('btn');
    //             is_liked = true
    //             dislike.addClass('disabled');
    //         }else if(res.result == 'dislike'){
    //             dislike.addClass('active').removeClass('btn');
    //             is_liked = true
    //             like.addClass('disabled');
    //         }
    //     }
    // })
})
