$(document).ready(()=>{

    // tooltip
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();

    // alert
    $(".reg-alert").hide()

    // register student
    $("#student-reg-form").on("submit", (e)=>{

        e.preventDefault()

        let form_data = $("#student-reg-form")[0]

        $.ajax({
            url:'../../models/server/reg/student-reg.php',
            method:'POST',
            cache:false,
            processData: false,
            contentType: false,
            data: new FormData(form_data),
            success:(StudentReg_Response)=>{
                // console.log(StudentReg_Response)
                let student_reg = JSON.parse(StudentReg_Response)
                if(student_reg.status == 'failed' && student_reg.error == null){
                    $(".reg-alert").show().addClass("alert-warning").text(student_reg.msg)
                    $(".reg-alert").removeClass("alert-success")
                    $(".reg-alert").removeClass("alert-danger")
                }
                else if(student_reg.status == 'failed' && student_reg.error != null){
                    $(".reg-alert").show().addClass("alert-danger").text(student_reg.msg + " \n Error: " + student_reg.error)
                    $(".reg-alert").removeClass("alert-success")
                    $(".reg-alert").removeClass("alert-warning")
                }
                else{
                    $(".reg-alert").show().addClass("alert-success").text(student_reg.msg)
                    $(".reg-alert").removeClass("alert-warning")
                    $(".reg-alert").removeClass("alert-danger")
                    $("#student-reg-form")[0].reset()
                }
            }
        })

    })

})