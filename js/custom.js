function setDatePicker(){
  $.fn.datepicker.dates['en'] = {
    days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
    daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
    daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
    months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
    monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
    today: "Hari Ini",
    clear: "Clear",
    format: "mm/dd/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
    weekStart: 0
  };
    $(".datepicker").datepicker({
      language:'en',
      format: "dd MM yyyy",
      todayHighlight: true,
      autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  }

  function setDateRangePicker(input1, input2){
    $(input1).datepicker({
      autoclose: true,
      format: "dd MM yyyy",
    }).on("change", function(){
      $(input2).val("").datepicker('setStartDate', $(this).val());
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  
    $(input2).datepicker({
      autoclose: true,
      format: "dd MM yyyy",
      orientation: "bottom right"
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  }
  
  function setMonthPicker(){
    $(".monthpicker").datepicker({
      format: "mm",
      maxViewMode: "months",
      minViewMode: "months",
      todayHighlight: true,
      autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  }
  
  function setYearPicker(){
    $(".yearpicker").datepicker({
      format: "yyyy",
      maxViewMode: "years",
      minViewMode: "years",
      todayHighlight: true,
      autoclose: true
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  }
  
  function setYearRangePicker(input1, input2){
    $(input1).datepicker({
      format: "yyyy",
      maxViewMode: "years",
      minViewMode: "years",
      todayHighlight: true,
      autoclose: true
    }).on("change", function(){
      $(input2).val("").datepicker('setStartDate', $(this).val());
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  
    $(input2).datepicker({
      format: "yyyy",
      maxViewMode: "years",
      minViewMode: "years",
      todayHighlight: true,
      autoclose: true,
      orientation: "bottom right"
    }).attr("readonly", "readonly").css({"cursor":"pointer", "background":"white"});
  }