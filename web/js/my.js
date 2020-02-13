
$('.mydel').on('click',function(e) {
	e.preventDefault();
	id=$(this).attr('id');
   cl='.del'+id;
     $(cl).remove();

});