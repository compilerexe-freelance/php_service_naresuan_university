Date date = new Date();
  SimpleDateFormat simple_date = new SimpleDateFormat("dd/MM/yyyy", new Locale("th", "th"));
  DateFormat date_formate = DateFormat.getDateTimeInstance(DateFormat.LONG, DateFormat.DEFAULT);
        
  String date_str = simple_date.format(date);
  String time = date_formate.format(date);
  System.out.println(date_str);  
  System.out.println(time.substring(time.length()-8, time.length()));