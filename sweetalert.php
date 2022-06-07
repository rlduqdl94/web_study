<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
   <style media="screen">

   </style>
  </head>
  <body>
<!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->

<script src="./alert.js"></script>


<input type="button" name="" value="알람1" onclick="test1();">
<input type="button" name="" value="알람2" onclick="test2();">
<input type="button" name="" value="알람3" onclick="test3();">
<input type="button" name="" value="알람4" onclick="test4();">

<input type="button" name="" value="알람5" onclick="test5();">
<input type="button" name="" value="알람6" onclick="test6();">
<input type="button" name="" value="알람7" onclick="test7();">
<input type="button" name="" value="알람8" onclick="test8();">




<input type="button" name="" value="알람9" onclick="test9();">
<input type="button" name="" value="알람10" onclick="test10();">
<input type="button" name="" value="알람11" onclick="test11();">
<input type="button" name="" value="알람12" onclick="test12();">

<input type="button" name="" value="알람13" onclick="test13();">
<input type="button" name="" value="알람14" onclick="test14();">
<input type="button" name="" value="알람15" onclick="test15();">
<script type="text/javascript">
  function test1(){
    Swal.fire('Any fool can use a computer')
  }
  function test2(){
    Swal.fire(
  'The Internet?',
  'That thing is still around?',
  'question'
)
  }
  function test3(){
    Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Something went wrong!',
  footer: '<a href="">Why do I have this issue?</a>'
})
  }
  function test4(){
    Swal.fire({
    imageUrl: 'https://placeholder.pics/svg/300x1500',
    imageHeight: 1500,
    imageAlt: 'A tall image'
  })
  }


  function test5(){
    Swal.fire({
      title: '<strong>HTML <u>example</u></strong>',
      icon: 'info',
      html:
        'You can use <b>bold text</b>, ' +
        '<a href="//sweetalert2.github.io">links</a> ' +
        'and other HTML tags',
      showCloseButton: true,
      showCancelButton: true,
      focusConfirm: false,
      confirmButtonText:
        '<i class="fa fa-thumbs-up"></i> Great!',
      confirmButtonAriaLabel: 'Thumbs up, great!',
      cancelButtonText:
        '<i class="fa fa-thumbs-down"></i>',
      cancelButtonAriaLabel: 'Thumbs down'
    })
  }
  function test6(){
    Swal.fire({
      title: 'Do you want to save the changes?',
      showDenyButton: true,
      showCancelButton: true,
      confirmButtonText: 'Save',
      denyButtonText: `Don't save`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        Swal.fire('Saved!', '', 'success')
      } else if (result.isDenied) {
        Swal.fire('Changes are not saved', '', 'info')
      }
    })
  }
  function test7(){
    Swal.fire({
      position: 'top-end',
      icon: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
  }
  function test8(){
    Swal.fire({
      title: 'Custom animation with Animate.css',
      showClass: {
        popup: 'animate__animated animate__fadeInDown'
      },
      hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
      }
    })
  }


  function test9(){
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
        Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      }
    })
  }
  function test10(){
    const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.isConfirmed) {
        swalWithBootstrapButtons.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        )
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    })

  }
  function test11(){
    Swal.fire({
      title: 'Sweet!',
      text: 'Modal with a custom image.',
      imageUrl: 'https://unsplash.it/400/200',
      imageWidth: 400,
      imageHeight: 200,
      imageAlt: 'Custom image',
    })
  }

  function test12(){
    Swal.fire({
      title: 'Custom width, padding, color, background.',
      width: 600,
      padding: '3em',
      color: '#716add',
      background: '#fff url(/images/trees.png)',
      backdrop: `
        rgba(0,0,123,0.4)
        url("/images/nyan-cat.gif")
        left top
        no-repeat
      `
    })
  }

  function test13(){
    let timerInterval
    Swal.fire({
      title: 'Auto close alert!',
      html: 'I will close in <b></b> milliseconds.',
      timer: 2000,
      timerProgressBar: true,
      didOpen: () => {
        Swal.showLoading()
        const b = Swal.getHtmlContainer().querySelector('b')
        timerInterval = setInterval(() => {
          b.textContent = Swal.getTimerLeft()
        }, 100)
      },
      willClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      /* Read more about handling dismissals below */
      if (result.dismiss === Swal.DismissReason.timer) {
        console.log('I was closed by the timer')
      }
    })
  }

  function test14(){
    Swal.fire({
      title: 'هل تريد الاستمرار؟',
      icon: 'question',
      iconHtml: '؟',
      confirmButtonText: 'نعم',
      cancelButtonText: 'لا',
      showCancelButton: true,
      showCloseButton: true
    })
  }

  function test15(){

   Swal.fire({
     title: 'Submit your Github username',
     input: 'text',
     inputAttributes: {
       autocapitalize: 'off'
     },
     showCancelButton: true,
     confirmButtonText: 'Look up',
     showLoaderOnConfirm: true,
     preConfirm: (login) => {
       return fetch(`//api.github.com/users/${login}`)
         .then(response => {
           if (!response.ok) {
             throw new Error(response.statusText)
           }
           return response.json()
         })
         .catch(error => {
           Swal.showValidationMessage(
             `Request failed: ${error}`
           )
         })
     },
     allowOutsideClick: () => !Swal.isLoading()
   }).then((result) => {
     if (result.isConfirmed) {
       Swal.fire({
         title: `${result.value.login}'s avatar`,
         imageUrl: result.value.avatar_url
       })
     }
   })
  }
</script>
  </body>
</html>
