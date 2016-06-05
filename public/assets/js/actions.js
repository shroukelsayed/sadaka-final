<script>
  $('#btn').click(function() {
  if($('span.error').length &gt; 0){
    alert('Errors!');
    return false;
  } else {
    $('#btn-submit').after('<span class="error">Form Accepted.</span>');
    return false;
  }
});
</script>
