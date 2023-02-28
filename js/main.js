function signup() {

    let main_arr = new Array();
    if (localStorage.getItem('data') != "" && localStorage.getItem('data') != null) {
        main_arr = JSON.parse(localStorage.getItem('data'));
    }

    var obj = {
        "fullname": document.getElementById('f_name').value,
        "e_mail": document.getElementById('email').value,
        "pasword": document.getElementById('password').value

    }
    main_arr.push(obj);
    localStorage.setItem('data', JSON.stringify(main_arr));

    window.location.href = 'login.html'

}

function sign_up() {

    window.location.href = 'signup.html'

}

function login() {
    let login_data = new Array();
    if (localStorage.getItem('login_data') != "" && localStorage.getItem('login_data') != null) {
        login_data = JSON.parse(localStorage.getItem('login_data'));

    }

    var obj_1 = {

        "e_mail": document.getElementById('email_1').value,
        "pasword": document.getElementById('password_1').value

    }

    login_data.push(obj_1);
    localStorage.setItem('login_data', JSON.stringify(login_data));
    window.location.href = '../../FB clone/index2.html'

}



function show() {

    if (localStorage.getItem('data') != null && localStorage.getItem('data') != null) {
        let list = JSON.parse(localStorage.getItem('data'));
        let count = 1;


        for (let obj of list) {

            document.getElementById('print').innerHTML += `

    <tr>
        <td align="center">${count}</td>
        <td align="center">${obj.fullname}</td>
        <td align="center">${obj.e_mail}</td>
        <td align="center">${obj.pasword}</td>
    </tr>

`;
            count++;

        }
    } else {
        alert("No Data found");
    }

}


// function login(){

// let email=document.getElementById('email_1').value;
// let password=document.getElementById('password_1').value;
// let my_users=JSON.parse(localStorage.getItem('login_data'));
// let check=true;

// for(var i=0;i<my_users.length;i++){
// if(my_users[i].email==email_1 && my_users[i].password==password_1){
//     check=false;
//     alert("you are loged in");
// }

// }
// if(check){

//     alert("User not found");
// }

// }
