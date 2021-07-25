$(function() {
    var like = $('.js-like-toggle');
    var likeItemId;

    like .on('click', function() {
        var $this = $(this);
        likeItemId = $this.data('itemid');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/ajaxlike',
            type: 'POST',
            data: {
                'item_id':likeItemId
        }
        })

    //成功
    .done(function(data) {
        $this.toggleClass('loved');
        $this.next('.likeCount').html(data.itemLikesCount);
    })

      //失敗
    .fail(function(data, xhr, err){
        console.log('エラー');
        console.log(err);
        console.log(xhr);
    });
    return false;

    });
});
