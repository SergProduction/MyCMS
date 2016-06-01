$(document).ready(function(){
  $('.left ul li').on('click','span',function(event){
    event.preventDefault();
    var as = $(event.target).data('val');
    var as = as + '.php';
    $('#right').load(as);
  })
})
////////////////////////////////////////////// куки
function delete_cookie ( cookie_name )
{
  var cookie_date = new Date ( );  // Текущая дата и время
  cookie_date.setTime ( cookie_date.getTime() - 1 );
  document.cookie = cookie_name += "=; expires=" + cookie_date.toGMTString();
}
function del_cook(){
delete_cookie("id");
delete_cookie("hash");
}

///////////////////////////////////////////////
$(document).ready(function(){

  $('.left').on('click','a',function(event){
    
  })
})
/////////////////////////////////////////////// показать
function vib_panel (){
  $('.vib, .table_block tr:eq(1)').on('click','span',function(event){
    event.preventDefault();
    var id = $(event.target).attr('data-id');
    if( id == undefined )
      { id = 0 }
    $('.vib span:eq(0), .vib span:eq(1), .vib span:eq(2)').attr('data-id', id);
    var as = $(event.target).data('val') + '.php';
    $.ajax({
      type:'post',
      url: as,
      data:{'id':id},
      success: function(data) {
            $('.content').html(data);
            }
        });
    //$('.content').load(as);
  })
}
/////////////////////////////////////////////// редактировать
function edit_del (){
  $('.table_block .icon').on('click', function(event){
  var val = $(event.target).attr('data-val');
  var id = $(event.target).attr('data-id');
  var type = $(event.target).attr('data-type');
  
  if(val == 'delete'){
    as = 'delete.php';
    var poddel = confirm("Вы точно хотите удалить?");
    if( poddel == false )
      return;
  }else if(val == 'edit'){
    as = 'edit_form.php';
    var poddel = confirm("Вы точно хотите редактировать?");
    if( poddel == false)return;
  }
    $.ajax({
      type:'post',
      url:'block/'+as,
      data:{'id':id,'type':type},
      success: function(data) {
        id = $('.vib span:eq(1)').attr('data-id');
        $.ajax({
          type:'post',
          url:'block/sel_section.php',
          data:{'id':id},
          success: function(data) {
            $('.content').html(data);
          }
        });
      }
    });
  });

  $('.table_block .folder').on('click', function(event){
    var id = $(event.target).attr('data-id');
    $('.vib span:eq(0), .vib span:eq(1), .vib span:eq(2)').attr('data-id', id);
    $.ajax({
      type:'post',
      url:'block/sel_section.php',
      data:{'id':id},
      success: function(data) {
            $('.content').html(data);
            }
        });
  })

}
