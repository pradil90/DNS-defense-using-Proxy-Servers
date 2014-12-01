package securityproxy;

import java.util.HashMap;

import java.util.Iterator;
import java.util.Set;


/*
 * Class:clientthreadhandler implements the TODO for threads created in Client PC
 * 
 *Constructor:clientthreadhandler(String Host);
 *Methods:dataStrorage(String keyValue);
 * 
 */

public class clientthreadhandler implements Runnable {
	
	
	
	private String host;
	
	
	/*
	 * Constructor for setting up host name for the thread
	 * 
	 */

		clientthreadhandler(String host){
		
					this.host=host;
										}

	
		/*
		 * run method for the threads being created
		 * 
		 */	
		
	public void run(){
		
		System.out.println("Resolving the host....\n" + host);
		System.out.println("Checking for " + host + " in Local cache....");
	 
		//Checking the local cache for data
		
		String xy=dataStrorage(host);
		
		
		if(xy.equalsIgnoreCase("false")){
			
			System.out.println("[Host name Not found in local cache]\n");
			System.out.println("Quering the proxy server...\n");
			String IP=SecurityproxyCACHE.queryBuilder(host);
			System.out.println("Final result:"+ IP);
			
				}else{
			System.out.println("The IP address resolved for the host "+ host +":" + xy);
				}
		
	}
	
	
	
	/*
	 * Start of main class
	 * 
	 * Purpose:Implements the Local cache to store the data for repeated queries
	 * Inputs:Takes the Domain name and returns the IP if present;"false" on not found;
	 * 
	 * 
	 */
	
	@SuppressWarnings("unchecked")
	public static String dataStrorage(String keyValue){
		
		boolean result;
		
		@SuppressWarnings("rawtypes")
		HashMap hm = new HashMap();
		
		// Put elements to the map
	    hm.put("www.amazon.com", new String("176.32.98.166"));
	    hm.put("www.facebook.com", new String("31.13.70.65"));
	    hm.put("www.netflix.com", new String("54.214.37.191"));
//	    hm.put("www.roku.com", new String("23.72.201.2"));
	    hm.put("www.youtube.com", new String("64.233.185.91"));
	    hm.put("www.yahoo.com", new String("206.190.36.45"));
	    
	    
	    
	 // Get a set of the entries
	    @SuppressWarnings("rawtypes")
		Set set = hm.entrySet();
	    
	    
	    // Get an iterator
	    @SuppressWarnings("rawtypes")
		Iterator i = set.iterator();
	  
	    String xy="";
	    if(hm.containsKey(keyValue)){
	    	System.out.println("Host found in the Local cache....retrieving IP address..");
	    	xy=(String) hm.get(keyValue);
	    }else{
	    	xy="false";
	    }
	   
	    return xy;

	}//End of dataStrorage Method

}//End of Main class
