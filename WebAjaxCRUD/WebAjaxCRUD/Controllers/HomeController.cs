using Newtonsoft.Json;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Web.Mvc;
using WebAjaxCRUD.Models;

namespace WebAjaxCRUD.Controllers
{
    public class HomeController : Controller
    {
        MvcAjaxEntities db = new MvcAjaxEntities();
        
        public ActionResult Index()
        {
            List<department> departmentList = db.departments.ToList();
            ViewBag.ListOfDepartment = new SelectList(departmentList, "departmentID", "departmentName");
            return View();
        }

        public JsonResult GetStudentList()
        {
            List<PersonViewModel> StuList = db.persons.Where(x => x.personeDelete == false).Select(x => new PersonViewModel
            {
                personID = x.personID,
                personName = x.personName,
                personSurname = x.personSurname,
                personNumber = x.personNumber,
                personMail = x.personMail,
                DepartmentName = x.department.departmentName,
            }).ToList();
            return Json(StuList, JsonRequestBehavior.AllowGet);
        }   

        public JsonResult GetStudentById(int personID)
        {
            person model = db.persons.Where(x => x.personID == personID).SingleOrDefault();
            string value = string.Empty;
            value = JsonConvert.SerializeObject(model, Formatting.Indented, new JsonSerializerSettings
            {
                ReferenceLoopHandling = ReferenceLoopHandling.Ignore,
            });
            return Json(value, JsonRequestBehavior.AllowGet);
        }

        public JsonResult SaveRecordInDatabase(PersonViewModel model)
        {
            var result = false;
            try
            {
                if(model.personID > 0)
                {
                    person prs = db.persons.SingleOrDefault(x => x.personeDelete == false && x.personID == model.personID);
                    prs.personName = model.personName;
                    prs.personSurname = model.personSurname;    
                    prs.personNumber = model.personNumber;
                    prs.personMail = model.personMail;
                    prs.personDep = model.personDep;
                    db.SaveChanges();
                    result = true;
                }
                else
                {
                    person prs = new person();
                    prs.personName = model.personName;
                    prs.personSurname = model.personSurname;
                    prs.personNumber = model.personNumber;
                    prs.personMail = model.personMail;
                    prs.personDep = model.personDep;
                    prs.personeDelete = false;
                    db.persons.Add(prs);
                    db.SaveChanges();
                    result = true;
                }
            }
            catch(Exception e)
            {
                throw e;
            }
            return Json(result, JsonRequestBehavior.AllowGet);
        }

        public JsonResult KayıtSil(int personID)
        {
            bool result = false;
            person prs = db.persons.SingleOrDefault(x => x.personeDelete == false && x.personID == personID);
            if (prs != null)
            {
                prs.personeDelete = true;
                db.SaveChanges();
                result=true;
            }
            return Json(result, JsonRequestBehavior.AllowGet);
        }
    }
}