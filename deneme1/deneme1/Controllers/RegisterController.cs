using deneme1.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net.Mail;
using System.Text;
using System.Web;
using System.Web.Hosting;
using System.Web.Mvc;
using System.Net;
using System.Configuration;
using System.Net.Configuration;
using System.Web.Helpers;

namespace deneme1.Controllers
{
    public class RegisterController : Controller
    {
        // GET: Register
        deneme1Entities db = new deneme1Entities();
        public ActionResult Index()
        {
            return View();
        }

        public JsonResult SaveUser(SiteUser model)
        {
            model.IsValid = false;
            model.Password = hashing.hash(model.Password);
            model.ResetPasswordCode = Guid.NewGuid().ToString();
            db.SiteUser.Add(model);
            db.SaveChanges();
            //sendmailonay(model.Email, model.ResetPasswordCode);
            return Json("kayıt başarılı", JsonRequestBehavior.AllowGet);
        }

        public JsonResult Login(SiteUser model)
        {
            string result = "Başarısız";
            var data = db.SiteUser.Where(x => x.Email == model.Email).SingleOrDefault();
            if (data != null)
            {
                if(string.Compare(hashing.hash(model.Password), data.Password) == 0)
                {
                    Session["userID"] = data.ID.ToString();
                    Session["userName"] = data.Username.ToString();
                    result = "Başarılı";
                }
                
            }
            return Json(result, JsonRequestBehavior.AllowGet);
        }

        public ActionResult AfterLogin()
        {
            if (Session["UserID"] != null)
            {
                return View();
            }
            else
            {
                return RedirectToAction("Index");
            }
        }

        public ActionResult Logout()
        {
            Session.Clear();
            Session.Abandon();
            return RedirectToAction("Index");
        }
        //[NonAction]
        //public void sendmailonay(string mailID, string activekodu)
        //{
        //    var verifyUrl = "/User/VerifyAccount/" + activekodu;
        //    var link = Request.Url.AbsoluteUri.Replace(Request.Url.PathAndQuery, verifyUrl);

        //    var fromEmail = new MailAddress("oakyildizproje@gmail.com", "Onur Akyıldız");
        //    var toEmail = new MailAddress(mailID);
        //    var fromEmailPassword = "WNYV47qOfKG5sUjR";
        //    string subject = "Your account is successfully created!";

        //    string body = "<br/><br/>" +
        //                        "<h2>E-posta doğrulama</h2>" + "<br/> bi sonraki adım için mail onayı gereklidir aşağıdaki bağlantıya tıklayarak onaylayabilirsiniz <br/> İyi Günler Dilerim <br/> RAVEN" + 
        //                  "<br/><br/>" +
        //                  "<a href='" + link + "'>" + link + "</a> ";

        //    var smtp = new SmtpClient
        //    {
        //        Host = "smtp.live.com",
        //        Port = 587,
        //        EnableSsl = true,
        //        DeliveryMethod = SmtpDeliveryMethod.Network,
        //        UseDefaultCredentials = false,
        //        Credentials = new NetworkCredential(fromEmail.Address, fromEmailPassword)
        //    };

        //    using (var message = new MailMessage(fromEmail, toEmail)
        //    {
        //        Subject = subject,
        //        Body = body,
        //        IsBodyHtml = true
        //    })
        //        smtp.Send(message);
        //}
    }
}

