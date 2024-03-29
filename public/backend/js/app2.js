const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

sideLinks.forEach(item => {
    item.addEventListener('click', () => {
        const clickedMenu = item.getAttribute('data-menu');
        
        // Remove "active" class from all links
        sideLinks.forEach(i => {
            i.parentElement.classList.remove('active');
        });

        // Add "active" class to the clicked link
        item.parentElement.classList.add('active');
    });
});

// const sideLinks = document.querySelectorAll('.sidebar .side-menu li a:not(.logout)');

// sideLinks.forEach(item => {
//     const li = item.parentElement;
//     item.addEventListener('click', () => {
//         sideLinks.forEach(i => {
//             i.parentElement.classList.remove('active');
//         })
//         li.classList.add('active');
//     })
// });

const menuBar = document.querySelector('.content nav .bx.bx-menu');
const sideBar = document.querySelector('.sidebar');

menuBar.addEventListener('click', () => {
    sideBar.classList.toggle('close');
});

const searchBtn = document.querySelector('.content nav form .form-input button');
const searchBtnIcon = document.querySelector('.content nav form .form-input button .bx');
const searchForm = document.querySelector('.content nav form');

searchBtn.addEventListener('click', function (e) {
    if (window.innerWidth < 576) {
        e.preventDefault;
        searchForm.classList.toggle('show');
        if (searchForm.classList.contains('show')) {
            searchBtnIcon.classList.replace('bx-search', 'bx-x');
        } else {
            searchBtnIcon.classList.replace('bx-x', 'bx-search');
        }
    }
});

window.addEventListener('resize', () => {
    if (window.innerWidth < 768) {
        sideBar.classList.add('close');
    } else {
        sideBar.classList.remove('close');
    }
    if (window.innerWidth > 576) {
        searchBtnIcon.classList.replace('bx-x', 'bx-search');
        searchForm.classList.remove('show');
    }
});

const toggler = document.getElementById('theme-toggle');

toggler.addEventListener('change', function () {
    if (this.checked) {
        document.body.classList.add('dark');
    } else {
        document.body.classList.remove('dark');
    }
});


       function confirmation(ev) {
       ev.preventDefault();
       var form = ev.currentTarget;
       var urlToRedirect = form.getAttribute('action');  
       console.log(urlToRedirect);

           swal({
               title: "Are you sure to Delete this post",
               text: "You will not be able to revert this!",
               icon: "warning",
               buttons: true,
               dangerMode: true,
           })

           .then((willCancel) => {
               if (willCancel) {
                   form.submit();
               }  
           });
       }
