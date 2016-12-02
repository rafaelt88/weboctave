function xdot = f (x, t) 
  r = 0.25;
  k = 1.4;
  a = 1.5;
  b = 0.16;
  c = 0.9;
  d = 0.8;
  xdot(1) = r*x(1)*(1 - x(1)/k) - a*x(1)*x(2)/(1 + b*x(1));
  xdot(2) = c*a*x(1)*x(2)/(1 + b*x(1)) - d*x(2);
endfunction
disp("Simulacion de ecuacion diferencial")
x = lsode ("f", [1; 2], (t = linspace (0, 50, 200)'));
plot (t, x)

pkg load control
R = 78;
L = 567e-6;
C = 40.87e-9;
num = [1/(L*C)];
den = [1 R/L 1/(L*C)];
G = tf(num,den);
disp("Diagrama de Bode")
bode(G);