<html>
    <body>
        <h1>Map Project</h1>
        <h2>Insert to Database</h2>
        <form action="/insert" method="post">
            <label>Borehole Name</label><br>
            <input name="name" required/><br>
            <label>Location</label><br>
            <input name="location" required/><br>
            <label>Longitude Coordinate</label><br>
            <input name="long" required/><br>
            <label>Latitude Coordinate</label><br>
            <input name="lat" required/><br>
            <label>Agency</label><br>
            <input name="agency" required/><br>
            <label>Date of Installment</label><br>
            <input type="date" name="doi" required><br>
            <label>Tapping</label><br>
            <input name="tapping" required/><br>
            <label>Status</label><br>
            <input name="status" required/><br><br>
            <input type="submit" value="Submit"><br>
        </form>
    </body>
</html>