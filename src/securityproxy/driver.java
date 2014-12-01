package securityproxy;

import java.sql.*;
import java.util.Date;


public class driver {

	public static void main(String[] args) {
		
		try{
			
			//to connect the database
			Connection myConn=DriverManager.getConnection("jdbc:mysql://localhost:3306/historyDB","root","");
//			Sql statement
//			Statement myst=myConn.createStatement();
			
//			//quesry
//			ResultSet myrs=myst.executeQuery("select * from history");
//			
//			while(myrs.next()){
//				System.out.println(myrs.getString("last_name"));
//			}
			
			Date date = new Date();
			Timestamp Time=new Timestamp(date.getTime());
			PreparedStatement preparedStmt= null;
			String sqlQuery1 = "insert into history(Dname,IP,Time) values(?,?,?);";
			preparedStmt = myConn.prepareStatement(sqlQuery1);
			preparedStmt.setString(1,"www.roku.com");
			preparedStmt.setString(2,"54.172.11.99");
			preparedStmt.setTimestamp(3,Time);
			preparedStmt.execute();
			
		}catch(Exception exc){
			exc.printStackTrace();
		}
		

	}

}
