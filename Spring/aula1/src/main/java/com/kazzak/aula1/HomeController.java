package com.kazzak.aula1;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;

@Controller
public class HomeController {

    @RequestMapping("/")
    public String HomeApp(Model model){
        model.addAttribute("mensagem","esta foi uma mensagem injetada por model");
        return "index";
    }

}
