
<?php 

class QueryConstants {
    // Category Queries
    const CATEGORY_INSERT_QUERY = "INSERT INTO categories VALUES (0, ?, ?, ?, ?, NOW(), 'Y')";
    const CATEGORY_UPDATE_QUERY = "UPDATE categories SET cate_parent_id = ?, cate_name = ?, cate_descript = ?, cate_img_loc = ?, cate_UpdatedDate = NOW() WHERE cate_id = ? AND status = 'Y'";
    const CATEGORY_DELETE_QUERY = "DELETE FROM categories WHERE cate_id = ?";
    const CATEGORY_SINGLE_DATE_QUERY = "SELECT * FROM categories WHERE cate_id = ?";
    const CATEGORY_PARENT_ID_QUERY = "SELECT cate_parent_id FROM categories WHERE cate_id = ?";
    const CATEGORY_ALL_DATE_QUERY = "SELECT * FROM categories";
    const CATEGORY_CUSTOM_ALL_DATE_QUERY = "SELECT cate1.cate_name AS parent_cate_name, cate2.* FROM categories cate1 RIGHT JOIN categories cate2 ON cate1.cate_id = cate2.cate_parent_id ORDER BY parent_cate_name";
    const PARENT_CATEGORY_ALL_DATE_QUERY = "SELECT cate_id, cate_name, cate_img_loc, cate_descript, cate_seq FROM categories WHERE cate_parent_id = 0 AND status = 'Y' ORDER BY cate_seq";
    const PARENT_CATEGORY_DATE_QUERY = "SELECT cate_id, cate_name, cate_img_loc FROM categories WHERE cate_parent_id = ? AND status = 'Y'";
    const SUB_CATEGORY_ALL_DATE_QUERY = "SELECT cate_id, cate_name, cate_img_loc, cate_parent_id FROM categories WHERE cate_parent_id != 0 AND status = 'Y'";
    const CATEGORY_UPDATE_STATUS_QUERY = "UPDATE categories SET cate_UpdatedDate = NOW(), status = ? WHERE cate_id = ?";
    
    // Product Queries
    const PRODUCT_INSERT_QUERY = "INSERT INTO ProductDetails VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    const PRODUCT_UPDATE_QUERY = "UPDATE ProductDetails SET cate_id = ?, productName = ?, natureOfProduct = ?, indication = ?, useDirection = ?, packing = ?, descript = ?, vegProduct = ?, additinalDescription = ?, type = ?, productCode = ?, productBrand = ?, productColor = ?, sizeheight = ?, sizelength = ?, liters = ?, trap = ?, updated_date = NOW(), updated_by = ?, recharge_validity = ?, lastcall = ?, nextCall = ?, number = ?, buyerName = ?, currentNumber = ?, status = ?, buyerContact = ?, Comments = ?, vendor_id = ? WHERE product_id = ?";
    const PRODUCT_DELETE_QUERY = "DELETE FROM ProductDetails WHERE product_id = ?";
    const PRODUCT_COUPON_DELETE_QUERY = "DELETE FROM Coupoun WHERE coupoun_id = ?";
    const PRODUCT_SINGLE_DATE_QUERY = "SELECT * FROM ProductDetails WHERE product_id = ? AND status = 'Y'";
    const PRODUCT_EDIT_SINGLE_DATE_QUERY = "SELECT * FROM ProductDetails WHERE product_id = ?";
    const PRODUCT_NUMBER_SINGLE_DATE_QUERY = "SELECT * FROM ProductDetails WHERE number = ?";
    const PRODUCT_CODE_SINGLE_DATE_QUERY = "SELECT productCode FROM ProductDetails WHERE productCode = ? AND status = 'Y'";
    const PRODUCT_ALL_DATE_QUERY = "SELECT * FROM ProductDetails";
    const PRODUCT_ADMIN_DATE_QUERY = "SELECT * FROM ProductDetails WHERE status = 'Y' ORDER BY product_id DESC";
    const PRODUCT_ADMIN_PANEL_QUERY = "SELECT pd.*, pod.rateInRupee, pod.rateblack, pod.discount, pod.flatdiscountedrate, cd.cate_name, vd.firstname AS vendorname FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id JOIN categories cd ON pd.cate_id = cd.cate_id JOIN vendorDetails vd ON pd.vendor_id = vd.id WHERE pd.status = 'Y' ORDER BY pd.product_id DESC";
    const PRODUCT_ADMIN_FILTER_QUERY = "SELECT pd.*, pod.rateInRupee, pod.rateblack, pod.discount, pod.flatdiscountedrate, cd.cate_name, vd.firstname AS vendorname FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id JOIN categories cd ON pd.cate_id = cd.cate_id JOIN vendorDetails vd ON pd.vendor_id = vd.id WHERE pd.status = 'Y' AND pd.number_status = ? ORDER BY pd.product_id DESC";
    const PRODUCT_ADMIN_SEARCH_QUERY = "SELECT pd.*, pod.rateInRupee, pod.rateblack, pod.discount, pod.flatdiscountedrate, cd.cate_name, vd.firstname AS vendorname FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id JOIN categories cd ON pd.cate_id = cd.cate_id JOIN vendorDetails vd ON pd.vendor_id = vd.id WHERE pd.number = ? ORDER BY pd.product_id DESC";
    const PRODUCT_STUCK_DELETE_QUERY = "DELETE FROM ProductDetails WHERE product_id NOT IN (SELECT product_id FROM ProductOtherDetails)";
    
    const PRODUCT_PENDING_EDITING_PANEL_QUERY = "SELECT pd.*, pod.rateInRupee, pod.rateblack, cd.cate_name, vd.firstname AS vendorname FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id JOIN categories cd ON pd.cate_id = cd.cate_id JOIN vendorDetails vd ON pd.vendor_id = vd.id WHERE pd.status = 'Y' AND pd.number_status = 'Available' AND pd.productName NOT LIKE '%<Strong>%' ORDER BY pd.product_id DESC";
    const PRODUCT_APPROVAL_DATE_QUERY = "SELECT * FROM ProductDetails WHERE status = 'N'";
    const PRODUCT_ALL_VENDOR_QUERY = "SELECT * FROM ProductDetails WHERE vendor_id = ?";
    const PRODUCT_UPDATE_STATUS_QUERY = "UPDATE ProductDetails SET status = ? WHERE product_id = ?";
    const PRODUCT_UPDATE_ALL_STATUS_QUERY = "UPDATE ProductDetails SET status = ? WHERE status = 'N'";
    const PRODUCT_SINGLE_DETAILS_QUERY = "SELECT pd.product_id, pd.productName, pd.type, pod.rateInRupee, pod.rateInDollar, pod.discount FROM ProductDetails pd JOIN ProductOtherDetails pod ON pd.product_id = pod.product_id WHERE pd.product_id = ?";
    
    // Product Image Queries
    const PRODUCT_IMAGE_INSERT_QUERY = "INSERT INTO ProductImageDetails VALUES (0, ?, ?, ?, NOW())";
    const PRODUCT_IMAGE_UPDATE_QUERY = "UPDATE ProductImageDetails SET img_seq_no = ?, img_comment = ?, updated_date = NOW() WHERE product_img_id = ?";
    const PRODUCT_IMAGE_DELETE_QUERY = "DELETE FROM ProductImageDetails WHERE product_img_id = ?";
    const PRODUCT_IMAGE_DELETE_QUERY_WITH_PRODUCTID = "DELETE FROM ProductImageDetails WHERE product_id = ?";
    const PRODUCT_IMAGE_SINGLE_DATE_QUERY = "SELECT * FROM ProductImageDetails WHERE product_img_id = ?";
    const PRODUCT_IMAGE_ALL_DATE_QUERY = "SELECT * FROM ProductImageDetails WHERE product_id = ?";
    const PRODUCT_IMAGE_DISPLAY_DATA_QUERY = "SELECT * FROM ProductImageDetails WHERE product_img_id = ? AND img_seq_no = '1'";
    
    // Product Rate Queries
    const PRODUCT_RATE_INSERT_QUERY = "INSERT INTO ProductOtherDetails VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?, NOW())";
    const PRODUCT_RATE_UPDATE_QUERY = "UPDATE ProductOtherDetails SET rateInRupee = ?, rateInDollar = ?, discount = ?, flatdiscountedrate = ?, ratewhite = ?, rateivory = ?, rateblack = ?, updated_by = ?, updated_date = NOW() WHERE product_id = ?";
    const PRODUCT_RATE_DELETE_QUERY = "DELETE FROM ProductOtherDetails WHERE product_id = ?";
    const PRODUCT_RATE_SINGLE_DATA_QUERY = "SELECT * FROM ProductOtherDetails WHERE product_id = ?";
    
    // Customer Login Details Queries
    const CUSTOMER_LOGIN_DETAILS_INSERT_QUERY = "INSERT INTO CustomerLoginDetails VALUES (0, ?, ?, ?, ?, NOW(), NOW(), 'Y')";
    const CUSTOMER_LOGIN_DETAILS_UPDATE_QUERY = "UPDATE CustomerLoginDetails SET emailid = ?, password = ?, forgetpasswordquestion = ?, answer = ?, updatedDate = NOW() WHERE cust_id = ?";
    const CUSTOMER_LOGIN_DETAILS_DELETE_QUERY = "DELETE FROM CustomerLoginDetails WHERE cust_id = ?";
    const CUSTOMER_LOGIN_DETAILS_SINGLE_DATE_QUERY_USING_ID = "SELECT * FROM CustomerLoginDetails WHERE cust_id = ?";
    const CUSTOMER_LOGIN_DETAILS_SINGLE_DATE_QUERY = "SELECT * FROM CustomerLoginDetails WHERE emailid = ?";
    const CUSTOMER_LOGIN_QUERY = "SELECT * FROM CustomerLoginDetails WHERE emailid = ? AND password = ? AND status = 'Y'";
    const CUSTOMER_LOGIN_QUERY_MOBILE = "SELECT * FROM CustomerLoginDetails WHERE answer = ? AND password = ? AND status = 'Y'";
    const CUSTOMER_LOGIN_QUERY_MOBILE_OTP = "SELECT * FROM CustomerLoginDetails WHERE answer = ? AND status = 'Y'";
    const CUSTOMER_LOGIN_DETAILS_ALL_DATA_QUERY = "SELECT * FROM CustomerLoginDetails";
    const CUSTOMER_LOGIN_UPDATE_STATUS_QUERY = "UPDATE CustomerLoginDetails SET status = ?, updatedDate = NOW() WHERE cust_id = ?";
    
    // Customer Shipping Address Queries
    const CUSTOMER_SHIPPING_ADDRESS_INSERT_QUERY = "INSERT INTO CustomerShippingDetails VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), ?, ?, ?)";
    const CUSTOMER_SHIPPING_ADDRESS_UPDATE_QUERY = "UPDATE CustomerShippingDetails SET firstName = ?, lastName = ?, contactNo1 = ?, contactNo2 = ?, address = ?, country = ?, state = ?, city = ?, pincode = ?, updatedDate = NOW(), companyName = ?, gstinNO = ?, accountType = ? WHERE cust_id = ?";
    const CUSTOMER_SHIPPING_ADDRESS_DELETE_QUERY = "DELETE FROM CustomerShippingDetails WHERE id = ?";
    const CUSTOMER_SHIPPING_ADDRESS_DELETE_QUERY_WITH_CUSTOMERID = "DELETE FROM CustomerShippingDetails WHERE cust_id = ?";
    const CUSTOMER_SHIPPING_ADDRESS_SINGLE_DATE_QUERY = "SELECT * FROM CustomerShippingDetails WHERE cust_id = ?";
    const ORDER_SHIPPING_DETAILS_INSERT_QUERY = "INSERT INTO OrderShippingDetails VALUES (0, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?)";
    const ORDER_SHIPPING_DETAILS_UPDATE_QUERY = "UPDATE OrderShippingDetails SET firstName = ?, lastName = ?, contactNo1 = ?, contactNo2 = ?, address = ?, country = ?, state = ?, city = ?, pincode = ?, gstinNO = ?, companyName = ? WHERE id = ?";
    const ORDER_SHIPPING_DETAILS_SINGLE_DATE_QUERY = "SELECT * FROM OrderShippingDetails WHERE id = ?";
    const ORDER_SHIPPING_DETAILS_DELETE_QUERY = "DELETE FROM OrderShippingDetails WHERE id = ?";
    const ORDER_SHIPPING_DETAILS_DELETE_QUERY_WITH_ORDERID = "DELETE FROM OrderShippingDetails WHERE order_id = ?";
    
    // Customer Feedback Queries
    const CUSTOMER_FEEDBACK_INSERT_QUERY = "INSERT INTO CustomerFeedback VALUES (0, ?, ?, ?, ?, ?, NOW(), NOW(), ?)";
    const CUSTOMER_FEEDBACK_UPDATE_QUERY = "UPDATE CustomerFeedback SET feedback = ?, updatedDate = NOW() WHERE feedback_id = ?";
    const CUSTOMER_FEEDBACK_DELETE_QUERY = "DELETE FROM CustomerFeedback WHERE feedback_id = ?";
    const CUSTOMER_FEEDBACK_SINGLE_DATE_QUERY = "SELECT * FROM CustomerFeedback WHERE feedback_id = ?";
    const CUSTOMER_FEEDBACK_ALL_DATE_QUERY = "SELECT * FROM CustomerFeedback";
    const CUSTOMER_FEEDBACK_DATE_QUERY = "SELECT * FROM CustomerFeedback WHERE cust_id = ?";
    
    // Order Queries
    const ORDER_INSERT_QUERY = "INSERT INTO Orders VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)";
    const ORDER_UPDATE_QUERY = "UPDATE Orders SET cust_id = ?, order_date = ?, product_id = ?, quantity = ?, amount = ?, status = ?, shipping_address = ?, delivery_date = ?, payment_method = ?, payment_status = ?, order_comment = ?, last_updated = NOW() WHERE order_id = ?";
    const ORDER_DELETE_QUERY = "DELETE FROM Orders WHERE order_id = ?";
    const ORDER_SINGLE_DATE_QUERY = "SELECT * FROM Orders WHERE order_id = ?";
    const ORDER_ALL_DATE_QUERY = "SELECT * FROM Orders";
    const ORDER_STATUS_QUERY = "SELECT * FROM Orders WHERE status = ?";
    
    // Vendor Details Queries
    const VENDOR_DETAILS_INSERT_QUERY = "INSERT INTO VendorDetails VALUES (0, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW(), 'Y')";
    const VENDOR_DETAILS_UPDATE_QUERY = "UPDATE VendorDetails SET firstname = ?, lastname = ?, company_name = ?, company_address = ?, phone_number = ?, email_id = ?, gstin = ?, contact_person = ?, designation = ?, updated_date = NOW() WHERE id = ?";
    const VENDOR_DETAILS_DELETE_QUERY = "DELETE FROM VendorDetails WHERE id = ?";
    const VENDOR_DETAILS_SINGLE_DATE_QUERY = "SELECT * FROM VendorDetails WHERE id = ?";
    const VENDOR_DETAILS_ALL_DATE_QUERY = "SELECT * FROM VendorDetails";
}

?>