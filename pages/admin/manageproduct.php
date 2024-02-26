<?php
// init includes
session_start();

if (!isset($_SESSION['email'])) {
    header('Location:auth/login.php');
    exit();
}

$useremail = $_SESSION['email'];

$webimage = "../../dist/ServerData/img/colivraison.png";

$adminlink = "../admin/admin.php";

$homelink = "../../index.php";

$manageuserslink = "manageusers.php";

$managecaseslink = "managecases.php";

$manageproduitlink = "manageproduct.php"; // Updated link

$profilelink = "profile.php";

$pricemanagelink = "pricemanage.php";

$settingslink = "parametre.php";

$logoutlink = "../php_handling/auth/dec.php";

include '../../init.php';

$dist = "../../" . $dist;

$partials  = "../../" . $partials;

$auth  = "../../" . $auth;

$pages = "../../" . $pages;

$plugins = "../../" . $plugins;

include '../../config.php';

include '../../icon.php';

include '../../links/css.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  
</head>

<body class="sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        include $partials . 'admin_headertop.php';
        include $partials . 'admin_headerleft.php';
        ?>

        <div class="content-wrapper" style="min-height: 2080.12px;">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 mb-5"></div>
                        <div class="col-md-12 mb-4"></div>
                        <div class="col">
                            <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#">Index</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Produits</li>
                                </ol>
                            </nav>
                            <div class="row">
                        <div class="col-12 card">
                            <div class="card-body">
                                <div class="row bg-gray-light m-1 rounded d-flex justify-content-center mt-1 ml-1 mr-1">
                                    <div class="col-6 text-muted mt-3 mb-3 ml-1">Add new product :</div>
                                    <div class="col-5 d-flex align-items-center justify-content-end">
                                        <a href="../php_handling/addproduit.php" class="btn btn-primary text-light mr-2">add produit</a>
                                        
                                    </div>
                                </div>
                                <label for="myUser">Select any user:</label>
<select name="myUser" class="form-control col-3" id="myUser" onchange="changeTable()">
    <option value="all">All</option>
    <?php
    // Fetch all emails from the database table
    $sql = "SELECT id, email, full_name FROM user";
    $result = $cnx->query($sql);

    // Create options using a loop
    while ($row = $result->fetch_assoc()) {
        $email = $row["email"];
        $name = $row['full_name'];
        echo "<option value='" . $email . "'>" . $name . "</option>";
    }
    ?>
</select>
                            </div>
                            
                        </div>
                    </div>
                           
                            <div class="row-10 table-responsive-md">
                                <table class="table align-middle mb-0 bg-white border">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="col-1">Id</th>
                                            <th class="col-2">Image</th>
                                            <th class="col-3">Name</th>
                                            <th class="col-4">Description</th>
                                            <th class="col-2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody id="productTableBody">

                                    </tbody>
                                </table>
                                <div class="card pb-5">
                                <div class="col-12" style="padding:10px;">
                             
<div class="justify-content-center">
<div id="paginationInfo" class="pagination justify-content-around">Page 1 of 1</div>
<div id="paginationContainer" class="pagination justify-content-center"></div>
</div>
                                </div>
                            </div>
                                
                            </div>
                        </div>
                    </div>
                  
                </div>
                </section>
        </div>
    
    <script>
    let currentPage = 1; // Initialize current page

    function changeTable(page = 1) {
        var emailId = document.getElementById('myUser').value;

        const formData = new FormData();
        formData.append('myUser', emailId);
        formData.append('page', page); // Include page number in the request

        fetch('../php_handling/admin_manageproduct.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const tbody = document.getElementById('productTableBody');
            // Clear existing rows
            while (tbody.firstChild) {
                tbody.removeChild(tbody.firstChild);
            }

            // Check if product_count is provided
            if (data.products.length > 0) {
                // Iterate over data.products and append rows
                data.products.forEach(row => {
                    const tr = document.createElement('tr');

                    // Create table cells for each product property
                    Object.entries(row).forEach(([key, value]) => {
                        const td = document.createElement('td');
                        if (key === 'product_imagepath') {
                            // Create an img element for the product image
                            const img = document.createElement('img');
                            img.src = value; // Set the image source to the image path
                            img.alt = 'Product Image';
                            img.style.maxWidth = '140px'; // Adjust image max-width as needed
                            img.style.maxHeight = '140px'; // Adjust image max-height as needed
                            td.appendChild(img);
                        } else {
                            // For other properties, just set the text content
                            td.textContent = value;
                        }
                        tr.appendChild(td);
                    });

                    tbody.appendChild(tr);
                });
            } else {
                // Handle case where no products are returned
                const tr = document.createElement('tr');
                const td = document.createElement('td');
                td.textContent = 'No products found.';
                td.colSpan = 5; // Set the colspan based on the number of columns in your table
                tr.appendChild(td);
                tbody.appendChild(tr);
            }

            // Update pagination information
            document.getElementById('paginationInfo').textContent = `Page ${data.current_page} of ${data.total_pages}`;
            currentPage = data.current_page;

            // Generate pagination links
            generatePaginationLinks(data.total_pages, currentPage);
        })
        .catch(error => {
            console.error('There was a problem with the fetch operation:', error);
        });
    }




    // Function to generate pagination links
    function generatePaginationLinks(totalPages, currentPage) {
        const paginationContainer = document.getElementById('paginationContainer');
        paginationContainer.innerHTML = ''; // Clear existing pagination links
        
        // Previous Page Button
        const previousButton = document.createElement('li');
        previousButton.classList.add('page-item');
        if (currentPage === 1) {
            previousButton.classList.add('disabled');
        }
        const previousLink = document.createElement('a');
        previousLink.classList.add('page-link');
        previousLink.href = '#';
        previousLink.textContent = 'Previous';
        previousLink.onclick = () => {
            if (currentPage > 1) {
                changeTable(currentPage - 1);
            }
        };
        previousButton.appendChild(previousLink);
        paginationContainer.appendChild(previousButton);
        
        // Page Number Buttons
        let startPage = Math.max(1, currentPage - 2);
        let endPage = Math.min(totalPages, currentPage + 2);

        if (currentPage - 2 <= 1) {
            endPage = Math.min(5, totalPages);
        }

        if (currentPage + 2 >= totalPages) {
            startPage = Math.max(totalPages - 4, 1);
        }

        if (startPage > 1) {
            const ellipsisStart = document.createElement('li');
            ellipsisStart.classList.add('page-item', 'disabled');
            ellipsisStart.innerHTML = '<span class="page-link">...</span>';
            paginationContainer.appendChild(ellipsisStart);
        }

        for (let i = startPage; i <= endPage; i++) {
            const pageButton = document.createElement('li');
            pageButton.classList.add('page-item');
            if (i === currentPage) {
                pageButton.classList.add('active');
            }
            const pageLink = document.createElement('a');
            pageLink.classList.add('page-link');
            pageLink.href = '#';
            pageLink.textContent = i;
            pageLink.onclick = () => {
                changeTable(i);
            };
            pageButton.appendChild(pageLink);
            paginationContainer.appendChild(pageButton);
        }

        if (endPage < totalPages) {
            const ellipsisEnd = document.createElement('li');
            ellipsisEnd.classList.add('page-item', 'disabled');
            ellipsisEnd.innerHTML = '<span class="page-link">...</span>';
            paginationContainer.appendChild(ellipsisEnd);
        }
        
        // Next Page Button
        const nextButton = document.createElement('li');
        nextButton.classList.add('page-item');
        if (currentPage === totalPages) {
            nextButton.classList.add('disabled');
        }
        const nextLink = document.createElement('a');
        nextLink.classList.add('page-link');
        nextLink.href = '#';
        nextLink.textContent = 'Next';
        nextLink.onclick = () => {
            if (currentPage < totalPages) {
                changeTable(currentPage + 1);
            }
        };
        nextButton.appendChild(nextLink);
        paginationContainer.appendChild(nextButton);
    }

    // Trigger the change event when the page is loaded
    window.addEventListener('DOMContentLoaded', function() {
        var selectElement = document.getElementById('myUser');
        var event = new Event('change');
        selectElement.dispatchEvent(event);
    });
</script>
    <?php
     
     include $partials . 'footer.php';
    
    include  '../../links/js.php';
    ?>
</body>

</html>