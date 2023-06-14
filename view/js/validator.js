
function validate(){
    
    $("#registrationForm").validate({
        rules: {
            firstName: {
                required: true
            },
            lastName: {
                required: true
            },
            username:{
                required: true
            },
            address: {
                required: true
            },
            useremail: {
                required: true,
                email: true
            },
            
            password: {
                required: true,
                minlength: 8
            },
            city: {
                required: true
            },
            state: {
                required: true
            },
            zip: {
                required: true
            }
        },
        messages: {
            firstName: {
                required: "Firstname is Required"
            },
            lastName: {
                required: "Lastname is Required"
            },
            username: {
                required: "Username is Required"
            },
            address: {
                required: "Address is Required"
            },
            useremail: {
                required: "Email is Required",
                email: "Must be a valid Email"
            },
            password: {
                required: "Password is Required",
                minlength: "Password must have minimum 8 character"
            },
            city: {
                required: "City is Required"
            },
            state: {
                required: "State is Required"
            },
            zip: {
                required: "Zip is Required"
            }
        }
    });
}

function validateLogin() {
    $("#loginForm").validate({
        rules: {
          
            username: {
                required: true
            },
            password: {
                required: true,
                minlength: 8
            },
        },
        messages: {
            username: {
                required: "Username is Required"
            },
            password: {
                required: "Password is Required",
                minlength: "Password must have 8 character atleast"
            },   
        }
    });
}