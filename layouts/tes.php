<?php
if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
  ?>
<script>
  swal({
  title: "<?php echo $_SESSION['status']; ?>",
  // text: "You clicked the button!",
  icon: "<?php echo $_SESSION['status_code']; ?>",
  button: "Aww yiss!",
});
</script>
<?php
unset($_SESSION['status']);
}
?>

Swal.fire({
    title: 'Are you sure?',
    text: "You won't be able to revert this!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, delete it!'
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: 'post',
        url: 'outlet.php',
        data: {
          'delid': true,
          'id': id,
        },

        success: function (response){

        }
      });
      Swal.fire(
        'Deleted!',
        'Your file has been deleted.',
        'success'
      )
      $('#tr_'+id).hide(2000);
    }   
  })