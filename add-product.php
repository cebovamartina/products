<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product Add</title>
</head>

<style>
    .form-row {
        display: flex;
        align-items: center;
    }

    .form-row label {
        margin-right: 10px;
    }

    .custom-button {
        border: 1px solid;
        padding: 10px;
        box-shadow: 5px 5px;
        margin-right: 10px;
    }
</style>

<body>

<form class="" action="connect.php" method="POST">
    <style>
        .product-add-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 40px;
        }

        .product-add-title {
            margin-right: 10px;
        }

        .product-add-buttons {
            margin-left: 10px;
        }
    </style>

    <div class="product-add-container">
        <h2 class="product-add-title">Product Add</h2>
        <div class="product-add-buttons">
            <button type="submit" name="submit" class="custom-button">Save</button>
            <button onclick="redirectToAnotherPage()" class="custom-button">Cancel</button>

        </div>
    </div>

    <hr style="width:100%;text-align:left;margin-left:0; height: 2px" ; color="grey">

    <br><br>


    <style>
        .invisible-border-table {
            border-collapse: collapse;
        }

        .invisible-border-table td {
            padding: 10px;
            border: none;
        }
    </style>

    <table class="invisible-border-table">
        <tr>
            <td>
                <div class="form-row">
                    <label for="sku">SKU:</label>
                </div>
            </td>
            <td>
                <div class="form-row">
                    <input type="text" id="sku" name="sku" required>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-row">
                    <label for="name">Name:</label>
                </div>
            </td>
            <td>
                <div class="form-row">
                    <input type="text" id="name" name="name" required>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-row">
                    <label for="price">Price ($)</label>
                </div>
            </td>
            <td>
                <div class="form-row">
                    <input type="number" min="0" step=".01" id="price" name="price" required>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <div class="form-row">
                    <label for="productType">Type Switcher</label>
                </div>
            </td>
            <td>
                <div class="form-row">
                    <select id="productType" name="productType" required>
                        <option>Type Switcher</option>
                        <option value="DVD">DVD</option>
                        <option value="Book">Book</option>
                        <option value="Furniture">Furniture</option>
                    </select>
                </div>
            </td>
        </tr>
    </table>

    <!-- Type-specific attributes -->
    <div id="typeSpecificAttributes">
        <!-- Size for DVD -->
        <div id="sizeField" style="display: none;">
            <table class="invisible-border-table">
                <tr>
                    <td>
                        <label for="size">Size (MB)</label>
                    </td>
                    <td>
                        <input type='number' min="0" value="0" id="size" name='size'>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Weight for Book -->
        <div id="weightField" style="display: none;">
            <table class="invisible-border-table">
                <tr>
                    <td>
                        <label for="weight">Weight (Kg)</label>
                    </td>
                    <td>
                        <input type='number' min="0" value="0" id="weight" name='weight'>
                    </td>
                </tr>
            </table>
        </div>

        <!-- Dimensions for Furniture -->
        <div id="dimensionsField" style="display: none;">
            <table class="invisible-border-table">
                <tr>
                    <td>
                        <label for="height">Height (CM)</label>
                    </td>
                    <td>
                        <input type='number' min="0" value="0" id="height" name='height'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="width">Width (CM)</label>
                    </td>
                    <td>
                        <input type='number' min="0" value="0" id="width" name='width'>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="length">Length (CM)</label>
                    </td>
                    <td>
                        <input type='number' min="0" value="0" id="length" name='length'>
                    </td>
                </tr>
            </table>
        </div>
    </div>


</form>

<!-- Add your JavaScript code here -->
<script>
    // JavaScript code to dynamically show/hide the type-specific attribute fields based on the selected product type
    var productTypeSelect = document.getElementById("productType");
    var sizeField = document.getElementById("sizeField");
    var weightField = document.getElementById("weightField");
    var dimensionsField = document.getElementById("dimensionsField");

    productTypeSelect.addEventListener("change", function () {
        var selectedType = this.value;
        sizeField.style.display = selectedType === "DVD" ? "block" : "none";
        weightField.style.display = selectedType === "Book" ? "block" : "none";
        dimensionsField.style.display = selectedType === "Furniture" ? "block" : "none";
    });

    // cancel button
    function redirectToAnotherPage() {
        window.location.href = "index.php";
    }
</script>
</body>
</html>
