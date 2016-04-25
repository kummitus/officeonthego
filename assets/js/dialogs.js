$('document').ready(function(){
  $('.deleteTaskImage').on(click, function(){
    BootstrapDialog.show({
	     title: 'Warning',
       message: 'Are you sure you want to delete?',
       buttons: [{
   		    label: 'Close',
          action: function(dialog) {
        	   dialog.close();
          }
        }, {
          label: 'Delete',
          cssClass: 'btn-primary btn-danger',
      	   action: function(dialog){
            dialog.close();
           }
      }]
    });
  });
});
