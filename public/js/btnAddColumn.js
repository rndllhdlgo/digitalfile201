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
            var dynamicCollege = "<tr><td>"+ college_name + "</td><td>" + college_degree + "</td><td>" + college_inclusive_years + "</td><td> <button class='btn btn-danger btn-college center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
            $("#college_data_table tbody").append(dynamicCollege);
            $("#college_name").val("");
            $("#college_degree").val("");
            $("#college_inclusive_years").val("");
            $(".btn-college").click(function (){
                $(this).parent().parent().remove();
                if($("#college_data_table tbody").children().children().length == 0){
                    $("#college_data_table").hide();
                   $("#college_data_table tbody").append(emptyRowCollege);
                }
            });
        } else{
            alert("Hello");
        } 
    });

//Training Table Add
    var emptyRowTraining = "<tr><td colspan='4' class='text-center'>No Records Available</td<tr>";

    $("#training_data_table tbody").append(emptyRowTraining);

    $('#btnTrainingAdd').click(function(){
        $("#training_data_table").show();
        var training_name = $('#training_name').val().trim();
        var training_title = $('#training_title').val().trim();
        var training_inclusive_years = $('#training_inclusive_years').val().trim();

        if(training_name != "" && training_title != "" && training_inclusive_years != ""){
            if($("#training_data_table tbody").children().children().length == 1){
               $("#training_data_table tbody").html("");
            }
            // var collegeNo = $("#college_data_table tbody").children().length + 1;
            var dynamicTraining = "<tr><td>"+ training_name + "</td><td>" + training_title + "</td><td>" + training_inclusive_years + "</td><td> <button class='btn btn-danger btn-training center' title='DELETE'> <i class='fas fa-trash-alt'></i> </button> </td></tr>";
            $("#training_data_table tbody").append(dynamicTraining);
            $("#training_name").val("");
            $("#training_title").val("");
            $("#training_inclusive_years").val("");
            $(".btn-training").click(function (){
                $(this).parent().parent().remove();
                if($("#training_data_table tbody").children().children().length == 0){
                    $("#training_data_table").hide();
                   $("#training_data_table tbody").append(emptyRowTraining);
                }
            });
        } else{
            alert("Hello");
        } 
    });
});