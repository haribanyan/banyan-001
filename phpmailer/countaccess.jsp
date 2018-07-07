<%-- 
    Document   : countaccess
    Created on : Dec 27, 2016, 4:16:28 PM
    Author     : Temp-222
--%>

<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
<body>
<form action="http://localhost:8084/servlet/faces/Countaccess" method="POST">
    <input type ="datetime-local"/>
<input type="hidden"value='<%=new java.util.Date()%>' name="Date">
<input type=submit value= submit>
</form>
</body>
</html>

