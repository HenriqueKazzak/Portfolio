package com.kazzak.aula1;

import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.builder.SpringApplicationBuilder;
import org.springframework.boot.web.servlet.support.SpringBootServletInitializer;
import org.springframework.context.ConfigurableApplicationContext;

import java.awt.*;
import java.io.IOException;
import java.net.MalformedURLException;
import java.net.URISyntaxException;
import java.net.URL;


@SpringBootApplication
public class Aula1Application implements CommandLineRunner {


	public static void main(String[] args) {
		SpringApplication.run(Aula1Application.class,args);
	}

	@Override
	public void run(String... args) throws Exception {
		System.out.println("Run");
	}

}
