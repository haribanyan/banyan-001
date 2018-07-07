/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

import java.io.IOException;
import java.io.PrintWriter;
import javax.servlet.ServletException;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.util.Date;
public class Countaccess extends HttpServlet
{

    private int accessCount = 0;

  protected synchronized void IncrementCount() {
    accessCount++;
  }

  protected synchronized int getCount() {
      return accessCount;
  }

    @Override
  public void doPost(HttpServletRequest req, HttpServletResponse res)
  throws ServletException, IOException
  {
    IncrementCount(); 
        PrintWriter out= res.getWriter();
   try
    {
        res.setContentType("text/html");
    Date serverDate=new Date();
    String clientDateStr = req.getParameter("Date");

    //out.println("<P><B>Server Side Date and time in millisecond= "+serverDate);
    //out.println("<P><B>Client Side Date and time in millisecond= "+clientDateStr);
       out.println("<P><B>Page Accesed "+getCount()+" Times");
 
   }
    catch(Exception e)
    {
        System.out.println(e);        
    }
  }
}


