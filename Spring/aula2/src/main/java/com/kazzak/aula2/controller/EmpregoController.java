package com.kazzak.aula2.controller;

import com.kazzak.aula2.Entity.Emprego;
import com.kazzak.aula2.EmpregoRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import javax.validation.Valid;
import java.util.Optional;

@Controller
public class EmpregoController {
    @Autowired
    EmpregoRepository empregoRepository;

    @RequestMapping("/")
    public String listEmpregos(Model model){
        model.addAttribute("empregos", empregoRepository.findAll());
        return "lista";
    }
    @GetMapping("/add")
    public String empregoForm(Model model){
        model.addAttribute("emprego",new Emprego());
        return "empregoForm";
    }
    @PostMapping("/process")
    public String processForm(@Valid Emprego emprego, BindingResult result){
        if (result.hasErrors()) {
            return "empregoForm";
        }
        empregoRepository.save(emprego);
        return "redirect:/";
    }

    @GetMapping(value = "/edit/{id}")
    public String editForm(@PathVariable Long id, Model model){
        Optional<Emprego> emprego = empregoRepository.findById(id);
        model.addAttribute("emprego",emprego);
        return "edit";
    }
    @PostMapping("/update/{id}")
    public String updateForm(@PathVariable Long id, @Valid Emprego emprego, BindingResult result, Model model){
        if (result.hasErrors()) {
            return "edit";
        }
        empregoRepository.save(emprego);
        return "redirect:/";
    }

}

