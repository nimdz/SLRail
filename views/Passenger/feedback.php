<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="/public/css/style_form.css">
</head>
<body>
    
<!-- footer -->

<div class="content">
      <div class="container" style="background-color: brown; text-align: center; padding: 10px;">
        <p style="color: white; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);">
            <span style="font-weight: bold;">SL Rail - </span>
            <span style="font-style: normal;">Revolutionizing Sri Lankan Rail Travel</span>
        </p>
    </div>
    <section class="features-section">
        <div class="container">    
            <h3>Your Feedback</h3>
        </div>
        <div class="container">
                <form action="action_page.php">
                    <div class="row">
                        <div class="col-25">
                          <label for="titl">Full Name</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="titl" name="title">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                          <label for="titl">Email</label>
                        </div>
                        <div class="col-75">
                          <input type="text" id="titl" name="title">
                        </div>
                    </div>
                  <div class="row">
                    <div class="col-25">
                      <label for="titl">Title</label>
                    </div>
                    <div class="col-75">
                      <input type="text" id="titl" name="title">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-25">
                      <label for="desc">Description</label>
                    </div>
                    <div class="col-75">
                      <textarea id="desc" name="subject" placeholder="Write something.." style="height:200px"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div>
                        <input type="submit" value="Send" class="update-btn", id="updatePro">
                        <button type="button" id="cancelButton" class="cancel-btn">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
        </div>        
    </section>
    </div>
    <!-- subfooter -->

    <div class="subfooter">
        <div class="subfooter-container">
            <h5>&copy; 2023 SL Rail. All rights reserved.</h5>
        </div>
    </div>
</body>
</html>