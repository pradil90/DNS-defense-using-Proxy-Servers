package securityproxy;

import java.io.*;
import java.io.ObjectInputStream.GetField;
import java.lang.*;
import java.net.*;
import java.util.*;
import java.lang.System;
import java.lang.Object;





public class Localcache {

	//Global variable initialization
	
	static Timer timer = new Timer();
	public static int loopcounter=1;
	static int maxNumberOfRequests=30;
	static String fileName,host;
	static File file;
	static Scanner inputStream = null;
	
	
	/*
	 * Start of main class
	 * 
	 * Purpose:Used for initializing calling other functions
	 * 
	 * 
	 * 
	 */
	
	public static void main(String [] args){
		
		
		System.out.println("====================================================================");
		System.out.println("       Real time DNS Hijacking Defense scheme-Security proxy Simulator         ");
		System.out.println("====================================================================");
		
		fileName="InputfromFile.txt";
		 file = new File(fileName);
		
		try {
			inputStream = new Scanner (file, "UTF-8");
		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}	
		timer.schedule(new Task(),1);	
    }
	
	
	/*
	 * Start of runnable for the task
	 * 
	 * Purpose:Implements multi-threading handle continous IP resolve request.
	 * 
	 * 
	 * 
	 */
	
static class Task extends TimerTask {
        
        public void run() {
        	
        	int delay = ((3) * 1000);
        	
        	 if(loopcounter<=maxNumberOfRequests){
        		 
        		 System.out.println("====================================================================");
        			System.out.println("                                                                  ");
        			System.out.println("====================================================================");
        		 
     
        		 
        		 if(inputStream.hasNext()){
        			 System.out.println("Please enter Host name to be resolved:");
        				 host=inputStream.next();
     			
     			System.out.println(host);
//        			Scanner in=new Scanner(System.in);
//        			String host=in.next();
     			clientthreadhandler handler=new clientthreadhandler(host);
                new Thread(handler).start();
                loopcounter++;
         		timer.schedule(new Task(), delay);
        		
        		}       			
        		 
        			
        	}else{
        		timer.cancel();
        	}
     			
        	 }
        	
        }
}
	
	

