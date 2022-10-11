//College Table Add
var emptyRowCollege = "<tr><td colspan ='4' class='text-center'>No Records Available</td></tr>";
$(document).ready(function(){
    $("#college_data_table tbody").append(emptyRowCollege);

    $('#btnCollegeAdd').click(function(){
        $("#college_data_table").show();
        var college_name = $('#college_name').val().trim();
        var college_degree = $('#college_degree').val().trim();
        var college_inclusive_years = $('#college_inclusive_years').val().trim();

        if(college_name != "" && college_degree != "" && college_inclusive_years != ""){
            if($("#college_data_table tbody").children().children().length == 1){
               $("#college_data_table tbody").html("");
            }
            // var collegeNo = $("#college_data_table tbody").children().length + 1;
            var dynamicCollege = "<tr><td>"+ college_name + "</td><td>" + college_degree + "</td><td>" + college_inclusive_years + "</td><td> <button class='btn btn-danger btn-sm'> DELETE </button> </td></tr>";
            $("#college_data_table tbody").append(dynamicCollege);
            $("#college_name").val("");
            $("#college_degree").val("");
            $("#college_inclusive_years").val("");
            $(".btn-sm").click(function (){
                $(this).parent().parent().remove();
                if($("#college_data_table tbody").children().children().length == 0){
                   $("#college_data_table tbody").append(emptyRowCollege);
                }
            });
        } else{
            alert("Hellooo");
        } 
    });
});